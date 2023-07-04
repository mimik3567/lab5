<?php
session_start(); // Обязательно вызывайте session_start() перед использованием сессий

// Проверка, была ли отправлена форма авторизации
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение введенных пользователем данных
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Проверка введенных данных для перенаправления на страницу admin.php
    if ($username === "admin@mail.ru" && $password === "00000") {
        // Перенаправление на страницу admin.php
        header("Location: admin.php");
        exit();
    }

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

    // Подготовка SQL-запроса для проверки логина и пароля
    $stmt = $conn->prepare("SELECT id, email, first_name FROM users WHERE email = ? AND password = ? ");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    // Проверка результата запроса
    if ($stmt->num_rows > 0) {
        // Верные логин и пароль
        // Сохранение данных пользователя в сессии
        $stmt->bind_result($id, $email, $first_name);
        $stmt->fetch();
        $_SESSION['username'] = $email;
        $_SESSION['first_name'] = $first_name;

        // Перенаправление на страницу профиля
        header("Location: polzov.php");
        exit();
    } else {
        // Неправильный логин или пароль
        $error = "Неправильно набраны пароль или почта.";
    }

    // Закрытие соединения с базой данных
    $stmt->close();
    $conn->close();
} else {
    // Если пользователь уже авторизован, перенаправление на страницу профиля
    if (isset($_SESSION['username'])) {
        // Пользователь уже авторизован
        // Перенаправление на страницу профиля
        header("Location: polzov.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.scss">
    <title>Sound Streamify</title>
</head>

<body class="body2">
    <div class="container2">
        <div class="avtoriz-obshii">
            <a href="index.php"><img class="logo-reg" src="img/Logo.svg"></a>
            <h1 class="Avtoreg_zogol">Авторизация</h1>
            <form id="loginForm" class="login-form" method="POST" action="">
                <div class="form-group">
                    <input type="text" class="button_Avt" id="username" name="username" placeholder="Электронная почта" required>
                </div>
                <div class="form-group">
                    <input type="password" class="button_Avt" id="password" name="password" placeholder="Пароль" required>
                </div>
                <?php
                // Вывод ошибки, если есть
                if (isset($error)) {
                    echo '<div class="error-message">' . $error . '</div>';
                }
                ?>
                <div class="poza">
                    <button type="submit" class="button_Avtorez">Вход</button>
                </div>
                <div class="poza3">
                    <a href="reg.php" class="lego">Регистрация</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
