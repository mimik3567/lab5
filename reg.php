<?php
session_start(); // Включение использования сессий

// Проверка, была ли отправлена форма регистрации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение введенных пользователем данных
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Подключение к базе данных
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "root";
    $dbname = "soundstremify";
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Проверка соединения с базой данных
    if ($conn->connect_error) {
        die("Ошибка соединения: " . $conn->connect_error);
    }

    // Проверка, существует ли пользователь с таким же email
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$username'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        $error = "Пользователь с таким email уже существует.";
    } else {
        // Проверка требований к паролю и email
        if (strlen($password) < 4) {
            $error = "Пароль должен быть не менее 4 символов.";
        } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL) || !strpos($username, '@mail.ru')) {
            $error = "Неправильный формат email. Введите действительный email от mail.ru.";
        } else {
            // Проверка капчи
            $captcha = $_POST["captcha"];
            $captchaResult = intval($_POST["captcha_result"]);
            if ($captcha != $captchaResult) {
                $error = "Неправильный ответ на капчу.";
            } else {
                // Верная капча, продолжаем обработку данных

                // Вставка нового пользователя в базу данных
                $insertQuery = "INSERT INTO users (id, first_name, last_name, email, phone, password) VALUES (NULL, '$firstName', '$lastName', '$username', '$phone', '$password')";
                if ($conn->query($insertQuery) === TRUE) {
                    // Отправка письма с подтверждением регистрации
                    $to = $username;
                    $subject = "Регистрация на сайте";
                    $message = "Вы успешно зарегистрировались на сайте. Спасибо!";
                    $headers = "From: mimik3567@soundstreamify.online"; // Замените на вашу электронную почту

                    mail($to, $subject, $message, $headers);

                    header("Location: avtor.php");
                    exit();
                } else {
                    $error = "Ошибка при регистрации: " . $conn->error;
                }
            }
        }
    }

    // Закрытие соединения с базой данных
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.scss">
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
    <style>
       
    </style>
</head>
<body class="body">
<div class="container2">
    <div class="div-header-section">
        <a href="index.php"><img class="logo-regis" src="img/Logo.svg" ></a>
        <h1 class="Avtoreg_zogol">Регистрация</h1>
        <form id="loginForm" class="login-form" method="POST" action="">
            <input class="cnopreg" type="text" name="first_name" placeholder="Имя" required><br>
            <input class="cnopreg" type="text" name="last_name" placeholder="Фамилия" required><br>
            <input class="cnopreg" type="text" name="phone" placeholder="Мобильный телефон" required><br>
            <input class="cnopreg" type="text" id="username" name="username" placeholder="Электронная почта" required><br>
            <div class="form-group">
                <input type="password" id="password" class="cnopreg"  name="password" placeholder="Пароль" required><br>
            </div>
            <div class="form-group1">
                <?php
                // Генерация математического вопроса
                $num1 = rand(1, 10);
                $num2 = rand(1, 10);
                $captchaResult = $num1 + $num2;
                echo "<label for='captcha'>Введите результат выражения: $num1 + $num2 = </label><br>";
                ?>
                <input type="text" id="captcha" name="captcha" required><br>
                <input class="kapch" type="hidden" name="captcha_result" value="<?php echo $captchaResult; ?>">
            </div>
            <?php
            if (isset($error)) {
                echo '<div class="error-message">' . $error . '</div>';
            }
            ?>
            <div class="poza1">
                <button type="submit" class="button_Zareg">Зарегистрироваться</button></div>
            <div class="poza2">
                <a class="registr" href="avtor.php">Авторизация</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<style>
.form-group1{
            color: white;
            font-size: 15px;
            font-family: 'Comfortaa', cursive;
            text-decoration: none;
            margin-left: 40px;
            margin-top: 30px;
        }

        .form-group1 input[type="text"] {
                background:#000000 ;
                color: rgb(255, 255, 255);
                font-size: 15px;
                padding: 10px 10px;
                border-radius: 20px; 
                border-color: #00FFC2;
                margin-left: 50px;
                margin-top: 10px;
        }
    </style>
