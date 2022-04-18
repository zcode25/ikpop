const loader = document.getElementById('preloader');
    window.addEventListener('load', function() {
    loader.style.display = 'none';
});

const live = document.getElementById('live');
const random = document.getElementById('random');
const video = document.getElementById('video');
console.log("ok")

live.addEventListener('click', function() {
    console.log('live');
    video.src = 'https://www.youtube.com/embed/F4aby5WN1Rw?controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1';
});

random.addEventListener('click', function() {
    console.log('random');
    video.src = 'https://www.youtube.com/embed/?list=RDqEy8of1f_3E&index=' + Math.floor(Math.random() * (50 - 1 + 1)) + '&controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1';
});