<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Печерский В.В.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navigation">
        <div class = "row">
            <div class="nav_logo">

            </div>
            <div class="nav_text">
                <a href="#about">О себе</a>
                <a href="#contact">Контакты</a>
                <a href="#skills">Навыки</a>
                <a href="#achievements">Достижения</a>
                <a href="#education">Образование</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Резюме</h1>
                <h3 id="about">Печерский Владислав</h3>
                <p><strong>Проживание:</strong> г. Москва</p>
                <p><strong>Дата рождения:</strong> 21.01.2003</p>
                <h2 id="contact">Контактная информация:</h2>
                <ul>
                    <li><strong>Телефон:</strong> +7918*****86</li>
                    <li><strong>Email:</strong> <a href="mailto:pe4ersky.vlad@yandex.ru">pe4ersky.vlad@yandex.ru</a></li>
                    <li><strong>Telegram:</strong> <a href="https://t.me/pvladon">@pvladon</a></li>
                </ul>
                <h2>Желаемая должность:</h2>
                <p>Спец по информационной безопасности</p>
                <h2 id="skills">Ключевые знания и навыки:</h2>
                <ul>
                    <li>Знание основ информационной безопасности</li>
                    <li>Знание основ операционных систем Windows и Linux</li>
                    <li>Умение расставлять приоритеты в задачах</li>
                    <li>Умение грамотно управлять временем</li>
                    <li>Умение выступать на публике</li>
                </ul>
                <h2 id="achievements">Достижения:</h2>
                <ul>
                    <li>Проходил обучение в «<a href="https://21-school.ru/">Школе 21</a>»</li>
                    <li>Прохожу курс по информационной безопасности от «<a href="https://solar.rt.ru/">Ростелеком-Солар</a>»</li>
                </ul>
                <h2 id="education">Образование:</h2>
                <p>РЭУ им. Г. В. Плеханова, направление «Информационная безопасность», бакалавриат, 3 курс</p>
            </div>
        
            <div class="col-4">
                <div class="row">
                    <h2>Тематический мем:</h2>
                </div>
                <div class="row photo">
                   <!--<img src="images/requests.jpg" alt="Забавная картинка 1"  width="300">-->
                </div>
                <div class="row">
                    <button id="myButton">Узнать подробности</button>
                    <p id="demo"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hello">
                    <?php echo $_COOKIE['User']; ?>, отправьте отклик на эту вакансию!
                </h1>
            </div>
            <div class="col-12">
                <form method='POST' action='profile.php' enctype="multipart/form-data" name="upload">
                    <input class="form" type="text" name="title" placeholder="Ваша компания">
                    <textarea name="text" cols="37" rows="5" placeholder="Ваше сообщение"></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="submit">Отправить</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>

<?php

require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}
?>

