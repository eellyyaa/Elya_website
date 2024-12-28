<?php
$servername = "127.0.0.1";  
$username = "your_user_name";  
$password = "password";  
$dbName = "bd_name";  

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
    die("Не удалось создать БД: " . mysqli_error($link));
}

$link = mysqli_connect($servername, $username, $password, $dbName);

if (!$link) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    die("Не удалось создать таблицу Users: " . mysqli_error($link));
}

$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    die("Не удалось создать таблицу posts: " . mysqli_error($link));
}

mysqli_close($link);
?>
