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
   <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Регистрация</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="registration.php">
                    <div class="row form_reg"><input class="form" type="email" name="email" placeholder="Email"></div>
                    <div class="row form_reg"><input class="form" type="text" name="login" placeholder="Login"></div>
                    <div class="row form_reg"><input class="form" type="password" name="password" placeholder="Password"></div>
                    <button type="submit" class="btn_red btn_reg" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
   </div>
</body>
</html>
<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'admin', '123', 'site');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];
    if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');
    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo "Не удалось добавить пользователя";
    } else {
        echo $result;
    }
}
?>