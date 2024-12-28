<?php
$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first'); 
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id) {
    $sql = "SELECT * FROM posts WHERE id=$id";
    $res = mysqli_query($link, $sql);
    if ($res && mysqli_num_rows($res) > 0) {
        $rows = mysqli_fetch_array($res);
        $title = $rows['title'];
        $main_text = $rows['main_text'];
    } else {
        die("Пост не найден.");
    }
}


if (isset($_POST['submit'])) {
   
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $main_text = mysqli_real_escape_string($link, $_POST['text']);

    if (!$title || !$main_text) {
        die("Заполните все поля!");
    }

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    if (!mysqli_query($link, $sql)) {
        die("Не удалось добавить пост");
    }

    if (!empty($_FILES["file"])) {
        $file_type = $_FILES["file"]["type"];
        $file_size = $_FILES["file"]["size"];
        $allowed_types = ['image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/x-png', 'image/png'];

        if (in_array($file_type, $allowed_types) && $file_size < 102400) {
       
            $upload_dir = "upload/";
            $upload_file = $upload_dir . uniqid() . '-' . basename($_FILES["file"]["name"]);

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_file)) {
                echo "Файл успешно загружен: " . $upload_file;
            } else {
                # Please enter the commit message for your changes. Lines starting
                # with '#' will be ignored, and an empty message aborts the commit.
                #
                # On branch main
                #
                # Initial commit
                #
                # Changes to be committed:
                    new file:   bd.php
                    new file:   css/style.css
                    new file:   images/fefu.jpg
                new file:   images/svin1.jpg
                    new file:   index.php
                    new file:   js/elya.js
                    new file:   login.php
                    new file:   profile.php
                new file:   registration.php
                #
                # Untracked files:
                    posts.php
                #
                
                echo "Ошибка загрузки файла!";
            }
        } else {
            echo "Загружаемый файл имеет неподдерживаемый тип или слишком большой!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пост</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <h1><?= htmlspecialchars($title) ?></h1>
    <p><?= nl2br(htmlspecialchars($main_text)) ?></p>

    <form method="POST" action="posts.php" enctype="multipart/form-data" name="upload">
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" class="form-control" placeholder="Заголовок" required />
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Текст поста</label>
            <textarea name="text" class="form-control" placeholder="Текст поста" required></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Загрузить файл</label>
            <input type="file" name="file" class="form-control" />
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Создать пост</button>
    </form>
</div>
</body>

</html>

