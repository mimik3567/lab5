let offset = 0;
const sliderLine = document.querySelector('.slaider-line');

document.querySelector('.slider-next').addEventListener('click', function () {
  offset = offset + 990;
  if (offset > 2970) {
    offset = 0;
  }
  sliderLine.style.left = -offset + 'px';
});

document.querySelector('.slider-prev').addEventListener('click', function () {
  offset = offset - 990;
  if (offset < 0) {
    offset = 2970;
  }
  sliderLine.style.left = -offset + 'px';
});

// Добавленный код для аудио

var audio = document.querySelector(".audioPlayer");
var audioControls = document.getElementById("audioControls");
var seekSlider = document.getElementById("seekSlider");

function showAudioControls() {
  audioControls.classList.add("show");
}

function toggleAudio() {
  if (audio.paused) {
    audio.play();
  } else {
    audio.pause();
    audio.currentTime = 0;
  }
}

function seekAudio() {
  var seekTime = audio.duration * (seekSlider.value / 100);
  audio.currentTime = seekTime;
}

function closeAudioControls() {
  audioControls.classList.remove("show");
  audio.pause();
  audio.currentTime = 0;
}

audio.addEventListener("timeupdate", function () {
  var seekPosition = (audio.currentTime / audio.duration) * 100;
  seekSlider.value = seekPosition;
});
