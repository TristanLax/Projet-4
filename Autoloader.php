<?php


class Autoloader {
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    
    static function autoload($class) {
        if($class == 'AdminController' || $class ==  'LoginController' || $class ==  'FrontController' || $class ==  'Controller'){
            include 'Controller/'.$class.'.php';
        }
        elseif ($class == 'DB' || $class ==  'Manager' || $class ==  'CommentManager' || $class ==  'PostManager' || $class ==  'UserManager') {
            include 'Manager/'.$class.'.php';
        }
        elseif ($class == 'deleteArticle' || $class == 'editArticle' || $class == 'getArticle' || $class ==  'getArticles' || $class == 'getComments' || $class == 'getReports' || $class == 'ignoreReport' || $class == 'moderateComment' || $class ==  'PDOFactory' || $class == 'postArticle' || $class == 'postComment' || $class == 'reportComment' || $class == 'User') {
            
            include 'Model/'.$class.'.php';
        }
    }
}