<?php
require_once('bd.php');

$link = mysqli_connect('127.0.0.1', 'root', 'password', 'name_db');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$email || !$username || !$password) {
        die('Пожалуйста, заполните все поля!');
    }

    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

    if (!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    } else {
        echo "Пользователь успешно зарегистрирован!";
    }
}
?>

<?php
require_once('bd.php');
if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <div class="container mt-5">
        <h2>Регистрация</h2>
        <form method="POST" action="registration.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Логин</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>
