<?php


class Autoloader {
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    
    static function autoload($class) {
        if($class == 'AdminController' || $class ==  'Controller' || $class ==  'FrontController' || $class ==  'LoginController'){
            include 'Controller/'.$class.'.php';
        }
        elseif ($class ==  'ChapitreManager' || $class ==  'CommentManager' || $class == 'DB' || $class ==  'Manager' || $class ==  'UserManager') {
            include 'Manager/'.$class.'.php';
        }
        elseif ($class == 'Chapitre' || $class == 'Comment' || $class == 'Modele' || $class == 'User' || $class == 'Dispatcher') {
            
            include 'Model/'.$class.'.php';
        }
    }
}