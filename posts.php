<?php
$link = mysqli_connect('127.0.0.1', 'admin', '123', 'site');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
$file_name = $rows['upload_name'];
?>
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
<?php
    echo "<h1>$title</h1>";
    echo "<p>$main_text</p>";
    
    if ($file_name !== NULL && $file_name !== '') {
        echo "<img src='upload/$file_name' alt='$title' class='img-fluid' />";
    }
?>
</body>
</html>