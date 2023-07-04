<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "soundstremify";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

// Установка максимального размера пакета
mysqli_query($conn, "SET GLOBAL max_allowed_packet = 67108864"); // 64MB

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    // Пользователь не авторизован, перенаправление на страницу авторизации
    header("Location: avtor.php");
    exit();
}

// Получение данных пользователя из сессии
$username = $_SESSION['username'];
$firstName = $_SESSION['first_name'];

// Обработка выхода из аккаунта
if (isset($_POST['logout'])) {
    // Уничтожение данных сессии
    session_destroy();

    // Перенаправление на главную страницу
    header("Location: index.php");
    exit();
}

// Получение всех добавленных треков
$sql = "SELECT * FROM tracks";
$result = mysqli_query($conn, $sql);

$tracks = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tracks[] = $row;
    }
}
// Обработка формы добавления трека
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addTrackButton'])) {
    $trackName = $_POST['trackName'];
    $artistName = $_POST['artistName'];

    // Проверка наличия файлов
    if (!empty($_FILES['photoInput']['tmp_name']) && !empty($_FILES['musicInput']['tmp_name'])) {
        // Загрузка фотографии
        $photoFile = $_FILES['photoInput']['tmp_name'];
        $photoData = mysqli_real_escape_string($conn, file_get_contents($photoFile));

        // Загрузка музыки
        $musicFile = $_FILES['musicInput']['tmp_name'];
        $musicData = mysqli_real_escape_string($conn, file_get_contents($musicFile));
// Добавление трека в базу данных
$sql = "INSERT INTO tracks (track_name, artist_name, photo_file, music_file) VALUES ('$trackName', '$artistName', '$photoData', '$musicData')";

if (mysqli_query($conn, $sql)) {
    echo "Трек успешно добавлен в базу данных.";

    // Сохранение данных в сессии
    $_SESSION['last_added_track_name'] = $trackName;
    $_SESSION['last_added_artist_name'] = $artistName;
} else {
    echo "Ошибка при добавлении трека: " . mysqli_error($conn);
}

    } else {
        echo "Пожалуйста, выберите файлы для загрузки.";
    }
}

// Обработка формы удаления трека
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteTrackButton'])) {
    $trackId = $_POST['trackId'];

    // Проверка наличия ID трека
    if (!empty($trackId)) {
        // Удаление трека из базы данных
        $sql = "DELETE FROM tracks WHERE id = '$trackId'";

        if (mysqli_query($conn, $sql)) {
            echo "Трек успешно удален";
        } else {
            echo "Ошибка при удалении трека: " . mysqli_error($conn);
        }
    } else {
        echo "Пожалуйста, введите ID трека для удаления.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="scss/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Fira+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&family=Fira+Sans:wght@300&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tulpen+One&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <title>Sound Streamify</title>
</head>
<body class="body">
    <header>
        <div class="container">
            <nav class="menu">
                <ul class="wrapper">
                        <li class="menu-list"><a href="index.php" ><img class="logo" src="img/Logo.svg"  ></a></li>
                        <li class="menu-list"><a href="index.php" class="menu-link">Главное</a></li>
                        <li class="menu-list"><a href="podkast.html" class="menu-link">Подкасты и книги</a></li>
                        <li class="menu-list"><a href="Potoki.html" class="menu-link">Потоки</a></li>
                        <li class="menu-list"><a href="Kollekcii.html" class="menu-link">Коллекции</a></li>
                    <form class="menu-form">
                        <input class="menu-input" type="text" >
                        <button class="menu-button"><img class="Poisk" src="img/poisk.svg"></button>
                    </form>
                        <li class="menu-list"><a href="avtor.php" ><img class="polz" src="img/polzovotel.svg"  ></a></li>
                </ul>
            </nav>
        </div>
    </header>
<div class="container">
<h1 class="prof" >Профиль пользователя</h1> 
            <div class="profile">
                
                <p class="text_polz"><br><?php echo $firstName; ?></p>
                <p class="text_polz"><br><?php echo $username; ?></p>
                <form method="POST" action="">
                    <button style="margin-left: 170px;  margin-top: -1px; " type="submit" name="logout" class="logout-button">Выход</button>
                </form>
            </div>
        </div>
<section id="addTrack">
    <div class="container">
        <div class="DABVLN">
        <h2 class="dab-zog">Добавление трека</h2><br>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="Dabiv_text" for="trackName">Название трека:</label><br>
                <input class="dab_input" type="text" id="trackName" name="trackName" required>
            </div><br>
            <div class="form-group">
                <label  class="Dabiv_text"for="artistName">Имя исполнителя:</label><br>
                <input class="dab_input"type="text" id="artistName" name="artistName" required>
            </div><br>
            <div class="form-group">
                <label  class="Dabiv_text"for="photoInput">Фотография:</label><br>
                <input class="dab_input-phot" type="file" id="photoInput" name="photoInput" accept="image/*" required>
            </div><br>
            <div class="form-group">
                <label  class="Dabiv_text"for="musicInput">Музыка:</label><br>
                <input class="dab_input-phot" type="file" id="musicInput" name="musicInput" accept=".mp3" required>
            </div><br>
            <button class="daab-buttn" type="submit" name="addTrackButton">Добавить трек</button>
        </form>
    </div>
</div>
</section>

<section id="deleteTrack">
    <div class="container">
        <h2 class="dab-zog">Удаление трека</h2>
        <form method="post">
            <div class="form-group2">
                <label class="remuve-text" for="trackId">Номер трека</label>
                <input class="remuve-vvod" type="number" id="trackId" name="trackId" required>
     
            <button  class="remuve" type="submit" name="deleteTrackButton">Удалить трек</button> <br><br>
               </div>
        </form>   
    </div>
</section>
<section id="addTrack">
    <div class="container">

        <form method="post" enctype="multipart/form-data">
            <!-- Форма добавления трека -->
        </form>
        
        <?php if (isset($_SESSION['last_added_track_name']) && isset($_SESSION['last_added_artist_name'])) : ?>
    <div class="track-info">

    </div>
<?php endif; ?>

            </div>
        
    <section id="addTrack">
    <h2 style="margin-left: 270px;  margin-top: 60px; " class="dab-zog" >Все добавленные треки</h2>
    </section>
    <section id="addTrack">
        <table class="trek">
        <thead>
            <tr>
             
           
            </tr>
        </thead>
        <tbody>
        </section>
            <?php foreach ($tracks as $track) : ?>
                <tr>
                    <td class="Trak_id"><?php echo $track['id']; ?></td>
                    <td class="Trak_name"><img src="data:image/jpeg;base64,<?php echo base64_encode($track['photo_file']); ?>" alt="Фотография трека" width="100"></td>
                    <td class="Trak_name"><?php echo $track['track_name']; ?></td>             
                     <td class="Trak_name"><audio controls src="data:audio/mpeg;base64,<?php echo base64_encode($track['music_file']); ?>"></audio></td>
                    <td class="Trak_name"><?php echo $track['artist_name']; ?></td>
      
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>
</section>
<style>
.Trak_id {
    color: #ffffff;
    font-family: 'Comfortaa', cursive;
    font-size: 20px;
}
    .Trak_name{
        color: #ffffff;
    }
    .trek{
    margin-left: 270px;
    margin-top: 30px;
    line-height: 26px;
    }

    .form-group2{
        margin-top: 50px;
        background-color:#1D1D1D;
        text-decoration: none;
        color: #000000;
        font-size: 25px;
        padding: 15px 60px;
        border-radius: 10px;
    }
    .dab-zog{
        font-family: 'Comfortaa', cursive;
        text-decoration: none;
        color: #ffffff;
        font-size: 36px;
        margin-top: 40px;
        font-weight: normal;
    }
    .dab_input{
        font-family: 'Familjen Grotesk', sans-serif;
        text-decoration: none;
        display: inline-block;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        font-size: 20px;
        line-height: 20px;
        padding: 10px 20px;
        border-radius: 10px;
    }
    .dab_input-phot{
        font-family: 'Familjen Grotesk', sans-serif;
        text-decoration: none;
        display: inline-block;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        font-size: 20px;
        line-height: 5px;
        padding: 15px 6px;
        border-radius: 10px;
    }
    .daab-buttn{
        
        background-color: #00FFC2;
        text-decoration: none;
        color: #000000;
        font-size: 25px;
        line-height: 20px;
        padding: 15px 40px;
        border-radius: 10px;
        margin-top: 20px;
      
    }
    .DABVLN{
        margin-left: 800px;
        margin-top: -330px;
    }
    .profile{
        background-color: #1D1D1D;
        margin-top: 20px;
        line-height: 38px;
        padding: 15px 100px;
        border-radius: 10px; 
        width: 300px;
    }
    .remuve-text{
        font-family: 'Comfortaa', cursive;
        text-decoration: none;
        color: #ffffff;
        font-size: 26px;
        margin-top: 40px;
        font-weight: normal;
    }
    .remuve-vvod{
        font-family: 'Familjen Grotesk', sans-serif;
        text-decoration: none;
        display: inline-block;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        font-size: 20px;
        line-height: 20px;
        padding: 10px 20px;
        border-radius: 10px;
        margin-left: 30px;
    }
.remuve{
    background-color: #00FFC2;
        text-decoration: none;
        color: #000000;
        font-size: 25px;
        line-height: 20px;
        padding: 15px 40px;
        border-radius: 10px;
        margin-top: 40px;
        margin-left: 280px;
}
.Dabiv_text{
    font-family: 'Comfortaa', cursive;
        text-decoration: none;
        color: #ffffff;
        font-size: 16px;
        margin-top: 40px;
        font-weight: normal;
}




    .new_zapis {
        margin-top: 50px;
        margin-left: -800px;
    }

    .fottto {
        margin-top: 30px;
    }

    .daab {
        font-family: 'Comfortaa', cursive;
        text-decoration: none;
        color: #ffffff;
        font-size: 36px;
        margin-top: 140px;
        font-weight: normal;
    }

    .text_polz {
        font-family: 'Comfortaa', cursive;
        color: white;
        font-size: 25px;
    }

    .prof {
        font-family: 'Comfortaa', cursive;
        text-decoration: none;
        color: #ffffff;
        font-size: 36px;
        margin-top: 100px;
        font-weight: normal;
    }

    .dabtrek {
        margin-top: -485px;
        margin-left: 770px;
    }

    .button_dab {
        background-color: #00FFC2;
        text-decoration: none;
        color: #000000;
        font-size: 25px;
        margin-left: 27px;
        line-height: 20px;
        padding: 15px 40px;
        border-radius: 10px;
    }

    .tez {
        font-family: 'Familjen Grotesk', sans-serif;
        color: white;
        font-size: 15px;
    }

    .nazvnart {
        font-family: 'Familjen Grotesk', sans-serif;
        text-decoration: none;
        display: inline-block;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        font-size: 20px;
        line-height: 20px;
        padding: 15px 40px;
        border-radius: 10px;
    }

    .nazvntrek {
        font-family: 'Familjen Grotesk', sans-serif;
        text-decoration: none;
        display: inline-block;
        background: rgb(255, 255, 255);
        color: rgb(0, 0, 0);
        font-size: 20px;
        line-height: 20px;
        padding: 15px 40px;
        border-radius: 10px;
    }

    .track-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        background-color:  #1D1D1D;
        border-radius: 10px;
        padding: 10px;
    }

    .track-photo {
        width: 100px;
        height: 100px;
        margin-right: 10px;
    }

    .track-info {
        color: white;
        font-size: 15px;
    }

    .track-audio {
        width: 600px;
    }

    .trackList {
        margin-top: 90px;
    }
.delete-button{
    background-color: #8e1e1e;
        color: #000000;
        font-size: 15px;
        padding: 5px 10px;
        border-radius: 5px;
        margin-right: 40px;
}

     .review-button {
        background-color:#00FFC2;
        color: #000000 ;
        font-size: 15px;
        padding: 5px 10px;
        border-radius: 5px;
        margin-left: -20px;
    }
</style>
</body>
</html>
$servername = "localhost";
$username = "u2122713_mimik";
$password = "mimik3567";
$dbname = "u2122713_soundstremify";

$conn = mysqli_connect($servername, $username, $password, $dbname);