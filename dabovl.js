// Обработчик изменения значения поля выбора фотографии
const photoInput = document.getElementById('photoInput');
const previewPhoto = document.getElementById('previewPhoto');
const photoStatus = document.getElementById('photoStatus');

photoInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function () {
        previewPhoto.src = reader.result;
        previewPhoto.style.display = 'block';
        photoStatus.innerText = 'Фото добавлено';
    }

    reader.readAsDataURL(file);
});

// Обработчик изменения значения поля выбора музыки
const musicInput = document.getElementById('musicInput');
const previewMusic = document.getElementById('previewMusic');
const audioSource = document.getElementById('audioSource');
const musicStatus = document.getElementById('musicStatus');

musicInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function () {
        audioSource.src = reader.result;
        previewMusic.style.display = 'block';
        musicStatus.innerText = 'Трек добавлен';
    }

    reader.readAsDataURL(file);
});

// Обработчик нажатия кнопки "Добавить трек"
const addTrackButton = document.getElementById('addTrackButton');
const trackList = document.getElementById('trackList');
const trackNameInput = document.getElementById('trackName');
const artistNameInput = document.getElementById('artistName');

addTrackButton.addEventListener('click', function () {
const trackName = trackNameInput.value;
const artistName = artistNameInput.value;
const photoFile = photoInput.files[0];
const musicFile = musicInput.files[0];

if (!trackName || !artistName || !photoFile || !musicFile) {
    alert('Пожалуйста, заполните все поля');
    return;
}

const trackItem = document.createElement('div');
trackItem.classList.add('track-item');

const trackPhoto = document.createElement('img');
trackPhoto.src = previewPhoto.src;
trackPhoto.alt = 'Фото трека';
trackPhoto.classList.add('track-photo');

const trackInfo = document.createElement('p');
trackInfo.classList.add('track-info');
trackInfo.innerText = `Название трека: ${trackName}\nисИмя артиста: ${artistName}`;

const trackAudio = document.createElement('audio');
const trackSource = document.createElement('source');
trackSource.src = audioSource.src;
trackSource.type = 'audio/mpeg';
trackAudio.classList.add('track-audio');
trackAudio.controls = true;
trackAudio.appendChild(trackSource);

const deleteButton = document.createElement('button');
deleteButton.classList.add('delete-button');
deleteButton.innerText = 'Удалить';
deleteButton.addEventListener('click', function () {
    trackList.removeChild(trackItem);
});

const reviewButton = document.createElement('button');
reviewButton.classList.add('review-button');
reviewButton.innerText = 'Отправить на рассмотрение';

trackItem.appendChild(trackPhoto);
trackItem.appendChild(trackInfo);
trackItem.appendChild(trackAudio);
trackItem.appendChild(deleteButton);
trackItem.appendChild(reviewButton);

trackList.appendChild(trackItem);

// Очистка полей
trackNameInput.value = '';
artistNameInput.value = '';
photoInput.value = '';
musicInput.value = '';
previewPhoto.style.display = 'none';
previewMusic.style.display = 'none';
photoStatus.innerText = '';
musicStatus.innerText = '';
});