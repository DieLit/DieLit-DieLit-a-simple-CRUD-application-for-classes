<?php   
namespace app\utils;

class Router{
    public static $listPages = [];

    public static function myGet($uri,$namePage){
        self::$listPages[] = [
            "uri"=> $uri,
            "pages"=> $namePage
        ];
    }

    public static function myPost($uri,$controller,$method,$data,$file){
        self::$listPages[] = [
            "uri" => $uri,
            "class" => $controller,
            "method"=> $method,
            "data" => $data,
            "file" => $file,
            "post" => true
        ];
    }

    public static function getContent(){
        $Q = $_GET["q"];

        foreach(self::$listPages as $per){
            if($per["uri"] === '/'.$Q){
                if($per['post'] === true && $_SERVER['REQUEST_METHOD'] ==='POST'){
                    switch($per["method"]){
                        case 'add':
                            $action = new $per["class"];
                            $method = $per["method"];
                            $action -> $method($_POST);
                            die();
                        case 'editInfo':
                            $action = new $per["class"];
                            $method = $per['method'];
                            $action -> $method($_POST);
                            die();
                        case 'dayOdin':
                            $action = new $per["class"];
                            $method = $per['method'];
                            $action -> $method($_POST);
                        case 'openInfo':
                            $action = new $per["class"];
                            $method = $per['method'];
                            $action -> $method($_POST);
                            die();
                        case 'deleteInfo':
                            $action = new $per['class'];
                            $method = $per['method'];
                            $action -> $method($_POST);
                            die();
                        case 'registration':
                            $action = new $per['class'];
                            $method = $per['method'];
                            $action -> $method($_POST);
                            die();
                        case 'auth_user':
                            $action = new $per['class'];
                            $method = $per['method'];
                            $action -> $method($_POST);
                            die();
                    }
                }else{
                    require_once "views/pages/".$per["pages"].'.php';
                die();
                }
            }
        }   
    }
}