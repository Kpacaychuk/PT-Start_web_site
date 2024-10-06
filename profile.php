<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алибеков А.Н.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.cdnfonts.com/css/marske" rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/3284c3a32cf946466fb963369b3c5b2d?family=Disket+Mono" rel="stylesheet">
</head>
<body>
    <div class="container nav_bar">
        <div class="row">
            <div class="col-3 nav_logo"></div>
            <div class="col-9">
                <div class="nav_text">Мастер киберимплантации</div>
            </div>
        </div>
    </div>
    <div class="container">
        
        <div class="row">
            <div class="col-8">
                <h2>Обо мне</h2>
                <p>Зовут меня Алибеков Амирхан Нариманович, но все меня знают
                    как Виктор Вектор или же просто Виктор. Я лучший медтехник,
                    татуировщик, установщик и продавец киберимплантов.
                    Имею собственную клинику, так что если нужны импланты -
                    это ко мне.</p>
            </div>
            <div class="col-4">
                <div class="row my_photo"></div>
                <div class="row"><p class="title_photo">Алибеков А.Н.</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Моя клиника</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    Привет, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="col-12">
            <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                <input class="form" type="text" name="title" placeholder="Заголовок вашего поста">
                <textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста ..."></textarea>
                <input type="file" name="file" /><br>
                <button type="submit" class="btn_red" name="submit">Сохранить пост</button>
            </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>
</html>
<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'admin', '123', 'site');
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    $file_name = $_FILES["file"]["name"];
    if (!$title || !$main_text) die ("Заполните все поля");
    $sql = "INSERT INTO posts (title, main_text, upload_name) VALUES ('$title', '$main_text', '$file_name')";
    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 1002400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . basename($_FILES["file"]["name"]));
            echo "Load in:  " . "upload/" . basename($_FILES["file"]["name"]);
        }
        else
        {
            echo "upload failed!";
        }
    }
}
?>