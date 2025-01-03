<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
    exit();
}


if (isset($_POST['submit'])) {

    $login = $_POST['username'];
    $password = $_POST['password'];


    if (!$login || !$password) {
        die('Пожалуйста, введите все данные!');
    }


    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'Elya_website');
    if (!$link) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE username='$login'";

    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
   
        $user = mysqli_fetch_assoc($result);

   
        if (password_verify($password, $user['password'])) {
      
            setcookie("User", $login, time() + 7200); 
            header('Location: profile.php');
            exit();
        } else {
            echo "Неправильный пароль.";
        }
    } else {
        echo "Неправильное имя пользователя или пароль.";
    }


    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Авторизация</h2>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="username" class="form-label">Логин</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</body>
</html>
