<?php

if (isset($_COOKIE['User'])) {
 
    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');
    if (!$link) {
        die("Ошибка подключения: " . mysqli_connection_error());
    }

    $sql = "SELECT * FROM posts";
    $res = mysqli_query($link, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo "<h2>Публикации пользователей:</h2>";
 
        while ($post = mysqli_fetch_array($res)) {
            echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a><br>\n";
        }
    } else {
        echo "Записей пока нет.";
    }

    mysqli_close($link);
} else {

    echo "<h2>Добро пожаловать на сайт!</h2>";
    echo "<p><a href='/registration.php'>Зарегистрируйтесь</a> или <a href='/login.php'>войдите</a>, чтобы просматривать контент!</p>";
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Главная страница</h1>

        <?php

        ?>
    </div>
</body>

</html>

            
