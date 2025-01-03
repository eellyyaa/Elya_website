<?php
if (!isset($_COOKIE['User'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yavorovich E.A.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="col-3 nav_logo"></div>
            <div class="col-9">
                <div class="nav_text">Немножко обо мне!</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8"> 
                <h2>Я Яворович Эльвира Алексеевна - студент второго курса Дальневосточного Федерального университета!</h2>
            </div>
            <div class="col-4"> 
                <div class="row my_photo"></div>
                <div class="title_photo"><p class="photo">@ellllka1</p></div>
            </div>
            <div class="col-2"> 
                <h3>Yavorovich Elvira</h3>
            </div>
        </div>     
        <div class="button_js col-12">
            <button id="myButton">Click me</button>
            <p id="demo"></p>
        </div>
    </div>

    <script>
        var count = 0;
        document.getElementById("myButton").onclick = function () {
            console.log("Кнопка нажата!");
            count++;
            if (count % 2 == 0) { 
                document.getElementById("demo").innerHTML = "";
            } else {
                var img = document.createElement("img");
                img.src = "https://laskavet.ru/wp-content/uploads/2018/08/soderzhanie-i-lechenie-morskih-svinok-800x563.jpg";
                document.getElementById("demo").appendChild(img);
            }
        }
    </script>
</body>
</html>

<?php
require_once('bd.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die('fill in all the fields');
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if(!mysqli_query($link, $sql)) die("can't add a post");
}
?>

