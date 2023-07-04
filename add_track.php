<?php
// Создание соединения с базой данных (вы можете использовать тот же код, что и ранее)

// Обработка AJAX-запроса
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получение данных из AJAX-запроса
    $photo = $_FILES["photo"]["name"];
    $photo_temp = $_FILES["photo"]["tmp_name"];
    $music = $_FILES["music"]["name"];
    $music_temp = $_FILES["music"]["tmp_name"];
    $trackName = $_POST["trackName"];
    $artistName = $_POST["artistName"];

    // Загрузка файла фотографии на сервер
    $photoFilePath = "uploads/photos/" . $photo;
    move_uploaded_file($photo_temp, $photoFilePath);

    // Загрузка файла музыки на сервер
    $musicFilePath = "uploads/music/" . $music;
    move_uploaded_file($music_temp, $musicFilePath);

    // Выполнение запроса INSERT INTO
    $sql = "INSERT INTO tracks (photo_file, music_file, track_name, artist_name) VALUES ('$photoFilePath', '$musicFilePath', '$trackName', '$artistName')";
    if ($conn->query($sql) === TRUE) {
        echo "Track added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
