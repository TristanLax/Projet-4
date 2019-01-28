<?php

/* Autoloader classique chargeant automatiquement la classe appellée en lui ajoutant le chemin correct. */

class Autoloader {
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    
    static function autoload($class) {
        if($class == 'AdminController' || $class ==  'Controller' || $class ==  'FrontController' || $class ==  'LoginController'  || $class ==  'ChapitreController' || $class ==  'CommentController' || $class ==  'HomeController'){
            include 'controller/'.$class.'.php';
        }
        elseif ($class ==  'ChapitreManager' || $class ==  'CommentManager' || $class ==  'Config' || $class == 'DB' || $class ==  'Manager' || $class ==  'UserManager') {
            include 'manager/'.$class.'.php';
        }
        elseif ($class ==  'Configuration') {
            include 'config/'.$class.'.ini';
        }
        elseif ($class == 'Chapitre' || $class == 'Comment' || $class == 'Modele' || $class == 'User' || $class == 'Dispatcher') {
            
            include 'model/'.$class.'.php';
        }
    }
}