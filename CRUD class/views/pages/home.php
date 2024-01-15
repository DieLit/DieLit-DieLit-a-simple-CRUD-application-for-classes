<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="/Info" method="POST">
        <input type = "text" name="info">
        <input type = "text" name="tooinfo">
        <button type="submit">submit</button>
</form>

<table>
<?php
use app\utils\Connect;
use app\controllers\Info;

$id = $_GET['id'];

$queryInfo = "SELECT * FROM `info`";

$allInfo = mysqli_query(Connect::connectDB(),$queryInfo);
$allInfo = mysqli_fetch_all($allInfo);

foreach($allInfo as $info){
?>

<tr>
    <td><?= $info[0] ?> </td>
    <td><?= $info[1] ?></td>
    <td><?= $info[2] ?></td>
</tr>


<td><a href="/open?id=<?= $info[0]?>">Open</a></td>
<td><a href="/edit?id=<?= $info[0] ?>">Edit</a></td>

<td>
<form action="/delete/Info" method="POST">
<input type="hidden" name='id' value=<?= $info[0]?>>
<button type='submit'>Delete</button>
</form>
</td>


<?php
}
?>

</table>



<br>

</body>
</html>