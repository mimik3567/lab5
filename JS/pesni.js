var audioPlayers = document.querySelectorAll(".audioPlayer");
var audioControls = document.querySelectorAll(".audio-controls");
var activeIndex = null;

function showAudioControls(index) {
  if (activeIndex !== null && activeIndex !== index) {
    closeAudioControls(activeIndex);
  }
  activeIndex = index;
  audioControls[index].classList.add("show");
}

function toggleAudio(index) {
  var audio = audioPlayers[index];
  if (audio.paused) {
    audio.play();
  } else {
    audio.pause();
    audio.currentTime = 0;
  }
}

function seekAudio(index) {
  var audio = audioPlayers[index];
  var seekSlider = audioControls[index].querySelector(".seekSlider");
  var seekTime = audio.duration * (seekSlider.value / 100);
  audio.currentTime = seekTime;
}

function closeAudioControls(index) {
  audioControls[index].classList.remove("show");
  var audio = audioPlayers[index];
  audio.pause();
  audio.currentTime = 0;
  activeIndex = null;
}

function updateSeekSlider(index) {
  var audio = audioPlayers[index];
  var seekSlider = audioControls[index].querySelector(".seekSlider");
  var seekPosition = (audio.currentTime / audio.duration) * 100;
  seekSlider.value = seekPosition;
}

