<?php

namespace app\controllers;
use app\utils\Connect;

class Info{

/////////////////////ДОБАВЛЕНИЕ ИНФЫ
    public static function add($data){
        $id = $_GET['id'];
        $info = $_POST['info'];
        $tooinfo = $_POST['tooinfo'];

        $queryAdd = "INSERT INTO `info` (`id`, `info`, `tooinfo`) VALUES (NULL, '$info', '$tooinfo')";
        $add = mysqli_query(Connect::connectDB(), $queryAdd);


        header("Location: /add");
        }


/////////////////////РЕДАКТИРОВАНИЕ ИНФЫ
    public static function editInfo($data){

        $id = $_POST['id'];
        $info = $_POST['infoww'];
        $tooinfo = $_POST['tooinfo'];

        $queryEdit = "UPDATE `info` SET `info`='$info', `tooinfo`= '$tooinfo' WHERE `info`.`id`='$id'";

        $red = mysqli_query(Connect::connectDB(), $queryEdit);

        
        if(!$red){
            die("edit error");
        }
        header("Location: /add");
    }

    public static function dayOdin($id){
        $queryOne = "SELECT * FROM `info` where `info`.`id` = '$id'";
        $one = mysqli_query(Connect::connectDB(), $queryOne);
        $one = mysqli_fetch_assoc($one);
        
        return $one;

    }

/////////////////////УДАЛЕНИЕ ИНФЫ
    public static function deleteInfo($data){
        $id = $_POST['id'];

        $deleteQuery = "DELETE FROM `info` WHERE `id` = '$id'";
        
        $delete = mysqli_query(Connect::connectDB(), $deleteQuery);
        
        
        header('Location: /add');
    }

/////////////////////ОПЕН ИНФЫ    
    public static function openInfo($id){

        $openQuery = "SELECT * FROM `info` WHERE `info`.`id`='$id'";

        $open = mysqli_query(Connect::connectDB(), $openQuery);
        $open = mysqli_fetch_assoc($open);

        return $open;        
    }

  

//////////////////////REGISTRATION
    public static function registration($data){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $toopass = $_POST['toopass'];


    $queryReg = "INSERT INTO `users` (`id`,`email`, `pass`) VALUES (NULL,'$email', '$pass')";
    
    if ($pass === $toopass) {
        $reg = mysqli_query(Connect::connectDB(), $queryReg);
        if (!$reg) {

            die(print_r('error DB'));
        }
    } else {
        die(print_r("pass != topass"));
    }

    header("Location: /");

}


///////////////////////AUTHORIZATION
    public static function auth_user($name) {
        $email = $name["email"];
        $pass = $name["pass"];

        $queryAllUsers = "SELECT * FROM `users` where `users`.`email` = '$email'";

        $queryTrueUser = mysqli_query(Connect::connectDB(), $queryAllUsers);
        $queryTrueUser = mysqli_fetch_assoc($queryTrueUser);
        print_r($queryTrueUser);

        if($name['email'] == $email && $name['pass'] == $pass){
            $_SESSION['user'] = [
                "email"=> $queryTrueUser['email'],
                "pass" => $queryTrueUser['pass']
            ]; 
            header("Location: /add");


        }if($name != $email && $name['pass'] != $pass){
            echo "error";
        }

    }
}