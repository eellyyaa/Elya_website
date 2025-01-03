<?php

if (!isset($_COOKIE['User'])) {
    header("Location: login.php");
    exit();
}

require_once('bd.php');

$username = $_COOKIE['User'];

$link = mysqli_connect('127.0.0.1', 'root', 'your_password', 'name_db');
if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE username='$username'";
$res = mysqli_query($link, $sql);
if ($res && mysqli_num_rows($res) > 0) {
    $user = mysqli_fetch_assoc($res);
    $email = $user['email'];
} else {
    die("Пользователь не найден.");
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
</head>

<body>
    <div class="container mt-5">
        <h2>Добро пожаловать в ваш профиль, <?= htmlspecialchars($username) ?>!</h2>
        <p>Электронная почта: <?= htmlspecialchars($email) ?></p>
        
        <h3>Ваши посты:</h3>
        <ul>
            <?php
     
            $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');
            if (!$link) {
                die("Ошибка подключения: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM posts WHERE username='$username'";
            $res = mysqli_query($link, $sql);

            if ($res && mysqli_num_rows($res) > 0) {
                while ($post = mysqli_fetch_assoc($res)) {
                    echo "<li><a href='posts.php?id=" . $post["id"] . "'>" . htmlspecialchars($post['title']) . "</a></li>";
                }
            } else {
                echo "<li>Вы еще не создали ни одного поста.</li>";
            }

            mysqli_close($link);
            ?>
        </ul>

        <a href="logout.php" class="btn btn-danger">Выйти</a>
    </div>
</body>

</html>
