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
        <div class="col-12 index">
        <?php
        if (!isset($_COOKIE['User'])) {
        ?>
            <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>, чтобы просматривать контент!
        <?php
        } else {
        ?>
            <a href="/profile.php">Мой профиль</a>
            <h1>Мои посты:</h1>
            <?php
            $link = mysqli_connect('127.0.0.1', 'admin', '123', 'site');
            $sql = "SELECT * FROM posts";
            $res = mysqli_query($link, $sql);
            if (mysqli_num_rows($res) >  0) {
                while ($post = mysqli_fetch_array($res)) {
                    echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a>\n";
                }
            } else {
                echo "Записей пока нет";
            }
        }
        ?>
        </div>
    </div>
</div>
</body>
</html>