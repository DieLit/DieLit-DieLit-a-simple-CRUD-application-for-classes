<?php

namespace app\utils;

class Connect{

    public static function connectDB(){
        $db = mysqli_connect("localhost","root","","db");

        if(!$db){
            die("нет подключения к бд");

        }else{
            return $db;
        }
    }

    // public static function connectUsers(){
    //     $users_db = mysqli_connect("localhost", "root", "", "users_db");

    //     if(!$users_db){
    //         die('users db error');
    //     }else{
    //         return $users_db;
    //     }
    // }

}