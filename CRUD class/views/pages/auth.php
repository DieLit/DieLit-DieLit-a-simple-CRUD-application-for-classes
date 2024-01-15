<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Авторизация</h1>
    <form action="/authorization" method="POST">
        <input type="email" name="email" id="email"><br>
        <input type="password" name="pass" id="pass"><br>
        <button type="submit">Войти</button><br>
        <a href="/reg">Регистрация</a>
    </form>

<?php
use app\utils\Connect;
use app\controllers\Info;

if($_SESSION['user'] !== NULL){

?> <h1> Вы вошли в аккаунт! </h1> <?php


}else{
    echo "not auth";
}
?>

</body>
</html>