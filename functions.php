<?php

$conn = mysqli_connect("localhost", "root", "", "ikpop");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}

function get_groups($groups)
{
    $groups2 = [];
    $i = 0;
    foreach ($groups as $group) {
        $result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=' . $group['groups_link'] . '&key=AIzaSyAxisypbiILUlLzMdiddBmElOxNbp6fR7E');
        $groups2[$i]['groups_id'] = $group['groups_id'];
        $groups2[$i]['groups_img'] = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
        // $groups2[$i]['groups_name'] = $result['items'][0]['snippet']['title'];
        $groups2[$i]['groups_name'] = $group['groups_name'];
        $groups2[$i]['subscriber'] = $result['items'][0]['statistics']['subscriberCount'];
        $i++;
    }

    return $groups2;
}

function get_group($groups)
{
    $groups2 = [];
    $result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=' . $groups['groups_link'] . '&key=AIzaSyAxisypbiILUlLzMdiddBmElOxNbp6fR7E');
    $groups2['groups_id'] = $groups['groups_id'];
    $groups2['groups_link'] = $groups['groups_link'];
    $groups2['groups_img'] = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
    // $groups2['groups_name'] = $result['items'][0]['snippet']['title'];
    $groups2['groups_name'] = $groups['groups_name'];
    $groups2['subscriber'] = $result['items'][0]['statistics']['subscriberCount'];

    return $groups2;
}

function get_musics($random)
{
    $musics3 = [];
    $i = 0;
    $result = get_CURL('https://www.googleapis.com/youtube/v3/playlistItems?part=snippet,contentDetails&playlistId=' . $random['musics_link'] . '&maxResults=50&key=AIzaSyAxisypbiILUlLzMdiddBmElOxNbp6fR7E');
    foreach ($result['items'] as $result) {
        $musics3[$i]['musics_link'] = $result['snippet']['resourceId']['videoId'];
        $musics3[$i]['musics_thumbnail'] = $result['snippet']['thumbnails']['medium']['url'];
        $musics3[$i]['musics_name'] = $result['snippet']['title'];
        $i++;
    }

    return $musics3;
}

function get_music($music_link)
{
    $music = [];
    $result = get_CURL('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails&id=' . $music_link . '&key=AIzaSyAxisypbiILUlLzMdiddBmElOxNbp6fR7E');
    $music['musics_name'] = $result['items'][0]['snippet']['title'];
    $music['musics_des'] = $result['items'][0]['snippet']['description'];
    $music['musics_date'] = $result['items'][0]['snippet']['publishedAt'];
    $music['musics_link'] = $result['items'][0]['id'];

    return $music;
}

function get_comments($music_link)
{
    $comments = [];
    $result = get_CURL('https://www.googleapis.com/youtube/v3/commentThreads?part=snippet&videoId=' . $music_link . '&maxResults=15&key=AIzaSyAxisypbiILUlLzMdiddBmElOxNbp6fR7E');
    $i = 0;
    foreach ($result['items'] as $result) {
        $comments[$i]['comments_textDisplay'] = $result['snippet']['topLevelComment']['snippet']['textOriginal'];
        $comments[$i]['comments_name'] = $result['snippet']['topLevelComment']['snippet']['authorDisplayName'];
        $comments[$i]['comments_img'] = $result['snippet']['topLevelComment']['snippet']['authorProfileImageUrl'];
        $comments[$i]['comments_date'] = $result['snippet']['topLevelComment']['snippet']['updatedAt'];
        $i++;
    }

    return $comments;
}

function addGroups($data)
{
    global $conn;
    $groups = query("SELECT max(groups_id) as kode_terbesar FROM groups")[0];
    $groups_id = $groups["kode_terbesar"];
    $urutan = (int) substr($groups_id, 1, 4);

    $urutan++;
    $huruf = "G";
    $groups_id = $huruf . sprintf("%04s", $urutan);

    $groups_name = htmlspecialchars($data["groups_name"]);
    $groups_link = htmlspecialchars($data["groups_link"]);
    $groups_des = htmlspecialchars($data["groups_des"]);

    $query = "INSERT INTO groups VALUES ('$groups_id', '$groups_name', '$groups_link', '$groups_des')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function editGroups($data)
{
    global $conn;
    $groups_id = htmlspecialchars($data["groups_id"]);
    $groups_name = htmlspecialchars($data["groups_name"]);
    $groups_link = htmlspecialchars($data["groups_link"]);
    $groups_des = htmlspecialchars($data["groups_des"]);

    $query = "UPDATE groups SET 
			
			groups_name = '$groups_name',
			groups_link = '$groups_link',
			groups_des = '$groups_des'
			
            WHERE groups_id = '$groups_id'
	";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteGroups($data)
{
    global $conn;
    $groups_id = htmlspecialchars($data["groups_id"]);

    $query = "DELETE FROM musics WHERE groups_id = '$groups_id'";
    $query2 = "DELETE FROM groups WHERE groups_id = '$groups_id'";
    mysqli_query($conn, $query);
    mysqli_query($conn, $query2);

    return mysqli_affected_rows($conn);
}

function random($data)
{
    global $conn;
    $musics = query("SELECT max(musics_id) as kode_terbesar FROM musics")[0];
    $musics_id = $musics["kode_terbesar"];
    $urutan = (int) substr($musics_id, 1, 4);

    $urutan++;
    $huruf = "M";
    $musics_id = $huruf . sprintf("%04s", $urutan);
    $groups_id = htmlspecialchars($data["groups_id"]);
    $random_link = htmlspecialchars($data["random_link"]);

    $random = query("SELECT * FROM musics WHERE groups_id = '$groups_id' AND musics_name = 'Random'");

    if (count($random) >= 1) {
        $musics_id_last = $random[0]["musics_id"];
        $query2 = "UPDATE musics SET 
			
			musics_link = '$random_link'
			
            WHERE musics_id = '$musics_id_last' AND groups_id = '$groups_id'
	";
        mysqli_query($conn, $query2);
    } else {
        $query = "INSERT INTO musics VALUES ('$musics_id', 'Random', '$random_link', '$groups_id')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}
