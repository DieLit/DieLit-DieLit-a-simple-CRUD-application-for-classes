<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>REDACTOR</h1>

<?php 

use app\controllers\Info;
$id = $_GET['id'];
$edit = Info::dayOdin($id);


?>

<form action="/edit/Info" method="POST">

    <input type="hidden" name="id" value="<?=$edit["id"]?> ">  <br>    
    <input type="text" name="infoww" value="<?=$edit["info"]?>"> <br>
    <input type="text" name="tooinfo" value="<?=$edit["tooinfo"]?>"><br>
    <input type="submit">

</form>

</body>
</html>