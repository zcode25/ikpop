-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2022 pada 13.12
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikpop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` char(5) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
('A0001', 'adamzein345@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `groups_id` char(5) NOT NULL,
  `groups_name` varchar(30) NOT NULL,
  `groups_link` varchar(50) NOT NULL,
  `groups_des` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`groups_id`, `groups_name`, `groups_link`, `groups_des`) VALUES
('G0001', 'PURPLE KISS', 'UCor8nQnEdMs4eBcU-uVBQ8g', 'Purple Kiss (Korea: 퍼플키스; Jepang: パープルキス; juga ditulis dalam huruf besar semua atau PURPLE K!SS) adalah grup vokal wanita Korea Selatan yang dibentuk oleh RBW pada tahun 2020. Grup ini terdiri dari tujuh anggota: Park Ji-eun, Na Go-eun, Dosie, Ireh, Yuki, Chaein, dan Swan.'),
('G0002', 'MAMAMOO', 'UCuhAUMLzJxlP1W7mEk0_6lA', 'Mamamoo (Hangul: 마마무), terkadang ditulis sebagai MAMAMOO, adalah grup vokal wanita asal Korea Selatan yang dibentuk oleh Rainbow Bridge World (sebelumnya WA Entertainment) pada tahun 2014. Grup ini secara resmi memulai debutnya pada tanggal 19 Juni 2014 dengan lagu \"Mr. Ambiguous\".'),
('G0003', 'Red Velvet', 'UCk9GmdlDTBfgGRb7vXeRMoQ', 'Red Velvet (Hangul: 레드벨벳) adalah grup vokal wanita asal Korea Selatan yang dibentuk oleh SM Entertainment pada tahun 2014 dan terdiri dari lima anggota. Nama Red Velvet memiliki gabungan arti, dimana red melambangkan warna yang menyala serta bergairah, dan velvet melambangkan citra feminin dan lembut.'),
('G0004', 'TWICE', 'UCzgxx_DM2Dcb9Y1spb9mUJA', 'Twice (Hangul: 트와이스; Jepang: トゥワイス), adalah sebuah grup idola wanita asal Korea Selatan yang dibentuk oleh JYP Entertainment. Grup ini terdiri dari sembilan anggota: Nayeon, Jeongyeon, Momo, Sana, Jihyo, Mina, Dahyun, Chaeyoung, dan Tzuyu. '),
('G0005', 'ITZY', 'UCDhM2k2Cua-JdobAh5moMFg', 'Itzy (Hangul: 있지) ditulis bergaya sebagai ITZY, adalah sebuah grup vokal wanita asal Korea Selatan yang dibentuk oleh JYP Entertainment. Itzy beranggotakan lima orang, yaitu Yeji, Lia, Ryujin, Chaeryeong, dan Yuna. Grup ini debut pada 11 Februari 2019, ditandai dengan perilisan album singel mereka, It\'z Different.'),
('G0006', 'aespa', 'UC9GtSLeksfK4yuJ_g1lgQbg', 'Aespa (에스파) adalah girl grup asal Korea Selatan yang dibentuk oleh SM Entertainment. Grup ini terdiri dari empat anggota: Karina, Giselle, Winterm dan Ningning. Mereka melakukan debut pada 17 November 2020 dengan single &quot;Black Mamba&quot;.'),
('G0007', 'Weeekly', 'UC5rp2rDRSpyKNj-QLytC-tw', 'Weeekly (bahasa Korea: 위클리) adalah sebuah grup vokal perempuan Korea Selatan tujuh anggota yang diluncurkan oleh Play M Entertainment. Grup tersebut adalah grup vokal perempuan kedua Play M Entertainment dalam 10 tahun, setelah Apink.'),
('G0008', 'SECRET NUMBER', 'UCIhPBu7gVRi1tnre0ZfXadg', 'Secret Number (Hangul: 시크릿넘버, Jepang: シークレットナンバー, ditulis sebagai Secret Number), merupakan sebuah grup idola wanita multinasional asal Korea Selatan yang berada dibawah naungan Vine Entertainment. Mereka melakukan debutnya pada tanggal 19 Mei 2020 dengan album singel bertajuk Who Dis? dan terdiri dari 5 anggota, yaitu: Léa, Dita, Jinny, Soodam, dan Denise.'),
('G0009', 'IU', 'UC3SyT4_WLHzN7JmHQwKQZww', 'Lee Ji-eun (bahasa Korea: 이지은; Hanja: 李知恩; lahir 16 Mei 1993) atau yang biasa dikenal dengan IU (bahasa Korea: 아이유) adalah seorang penyanyi-penulis lagu dan aktris berasal dari Korea.'),
('G0010', 'BLACKPINK', 'UCOmHUn--16B90oW2L6FRR3A', 'Blackpink (Korean: 블랙핑크; commonly stylized as BLACKPINK or BLΛƆKPIИK) is a South Korean girl group formed by YG Entertainment, consisting of members Jisoo, Jennie, Rosé, and Lisa.'),
('G0011', 'BTS', 'UCLkAepWjdylmXSltofFvsYQ', 'BTS (Korean: 방탄소년단; RR: Bangtan Sonyeondan), also known as the Bangtan Boys, is a South Korean boy band that was formed in 2010 and debuted in 2013 under Big Hit Entertainment. The septet—consisting of members Jin, Suga, J-Hope, RM, Jimin, V, and Jungkook—co-writes and co-produces much of their own output.'),
('G0012', 'EXO', 'UCzCedBCSSltI1TFd3bKyN6g', 'Exo (Korean: 엑소; stylized in all caps) is a South Korean-Chinese boy band based in Seoul, consisting of nine members: Xiumin, Suho, Lay, Baekhyun, Chen, Chanyeol, D.O., Kai and Sehun. The band was formed by SM Entertainment in 2011 and debuted in 2012.'),
('G0013', 'ASTRO 아스트로', 'UCZqY2yIsAM9wh3vvMwKd27g', 'Astro (Korean: 아스트로) is a South Korean boy band formed by Fantagio that debuted in 2016. The group is composed of six members: MJ, Jinjin, Cha Eun-woo, Moon Bin, Rocky and Yoon San-ha. They debuted with the single &quot;Hide &amp; Seek&quot; from their debut EP Spring Up, and were subsequently named by Billboard as one of the best new K-pop groups of 2016.'),
('G0014', 'GFRIEND', 'UCRDd3x33kfF0IW6g2MRUkRw', 'GFriend (stylized in all caps; Korean: 여자친구; RR: Yeoja Chingu) was a six-member South Korean girl group formed by Source Music in 2015. The group consisted of Sowon, Yerin, Eunha, Yuju, SinB, and Umji. They made their debut with the EP Season of Glass on January 15, 2015.'),
('G0015', 'fromis_9', 'UC8qO5racajmy4YgPgNJkVXg', 'Fromis 9 (Korean: 프로미스나인 or 프로미스 9), stylized as fromis_9, is a South Korean girl group formed by CJ E&amp;M through the 2017 reality show Idol School. The group is composed of nine members: Roh Ji-sun, Song Ha-young, Lee Sae-rom, Lee Chae-young, Lee Na-gyung, Park Ji-won, Lee Seo-yeon, Baek Ji-heon and Jang Gyu-ri.'),
('G0016', 'Dreamcatcher', 'UCijULR2sXLutCRBtW3_WEfA', 'Dreamcatcher (Korean: 드림캐쳐; formerly known as MINX; also stylized as Dream Catcher) is a South Korean girl group formed by Happyface Entertainment (now named Dreamcatcher Company). The group consists of seven members: JiU, SuA, Siyeon, Handong, Yoohyeon, Dami and Gahyeon. They officially debuted on January 13, 2017, with the single album Nightmare.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `musics`
--

CREATE TABLE `musics` (
  `musics_id` char(5) NOT NULL,
  `musics_name` varchar(50) NOT NULL,
  `musics_link` varchar(50) NOT NULL,
  `groups_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `musics`
--

INSERT INTO `musics` (`musics_id`, `musics_name`, `musics_link`, `groups_id`) VALUES
('M0001', 'Random', 'PLo7w9PYGRPJJXRdLuTCPw-w_Jnrp6fFij', 'G0001'),
('M0002', 'Random', 'PLLxxu3muPC1mqKPb4zm7PLIQk4t5ImXYn', 'G0002'),
('M0003', 'Random', 'PL6Fji7Qqk2dnXoO7quBUer-2d33OwyZHJ', 'G0003'),
('M0004', 'Random', 'PLfW8I5X8sLyxOrF_5oNNP1My-uGVYmobT', 'G0004'),
('M0005', 'Random', 'PLCcKMSYJ4B9f6H7DtAU7lbaEL2JVCflfu', 'G0005'),
('M0006', 'Random', 'PLmSYmpvvW-3FKYyaPE2M_ka5IPl-cxvT1', 'G0006'),
('M0007', 'Random', 'PLB282Z7iQP4LdW_WliSIA5rL2d2UO1yiU', 'G0007'),
('M0008', 'Random', 'PLCogFA8WaWFZdekHFOGIzHWSM0UnOq0_W', 'G0008'),
('M0009', 'Random', 'PLVTjHSQjpzRUpIHDg1E52liUzAOrNJfRk', 'G0009'),
('M0010', 'Random', 'PLNF8K9Ddz0kKfujG6blfAxngYh_C66C_q', 'G0010'),
('M0011', 'Random', 'PL1s89zMwwA_0KHFlD_PL5qVDptDaaC9Yh', 'G0011'),
('M0012', 'Random', 'PLArj42sxrlWZKtLHJbi1imCwNwyG1Puc1', 'G0012'),
('M0013', 'Random', 'PLBwC24QFoEFuq2f9a1Tmjo334zDq9E1Zc', 'G0013'),
('M0014', 'Random', 'PLUoU59M4qmAhOvP2a-J2ppzY6xgqEEPru', 'G0014'),
('M0015', 'Random', 'PLpiEhYw2jb5gT3rgrbSvl2pVGoRGe5p4O', 'G0015'),
('M0016', 'Random', 'PLo7w9PYGRPJI-HjFFObrYgKGs3vSYiVW4', 'G0016');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groups_id`);

--
-- Indeks untuk tabel `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`musics_id`),
  ADD KEY `groups_id` (`groups_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `musics`
--
ALTER TABLE `musics`
  ADD CONSTRAINT `musics_ibfk_1` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`groups_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
