<?php
session_start();

require('Autoloader.php');
Autoloader::register();

class Dispatcher {
    
    public function getController($params) {
        
        if(!isset($params['controller'])) {
            $params['controller'] = 'front';
        }
        
        $controller = ucfirst(strtolower($params['controller'])) . 'Controller';
        if(!file_exists('Controller/' . $controller . '.php' )) {
            throw new \Exception('Page non existante');
        }
        return $controller;
    }
    
    public function getAction($params) {
        
        if(!isset($params['action'])) {
            $params['action'] = 'accueil';
        }
        $action = ucfirst(strtolower($params['action'])) . 'Action';

        return $action;
    } 
    
    public function checkAction($controller, $action) {
            
          if(!method_exists($controller, $action)) {
              throw new \Exception($action . ': Action/Controlleur non trouvés');
          }
    }
    

    
}

$dispatcher = new Dispatcher();
$controllerName = $dispatcher->getController($_GET);
$controller = new $controllerName();
$action = $dispatcher->getAction($_GET);
$dispatcher->checkAction($controller, $action);
$controller->$action();


