<?php

/* Objet gérant les redirections de l'utilisateur, servant donc de routeur global au site. */

class Dispatcher 
{
    
    /* Fonction acceptant un paramètre, le nom du controlleur utilisé. Si aucun controlleur n'est spéficié, appellera automatiquement le front controlleur. Vérifie ensuite si le controlleur appellé existe puis le retournera, ou retournera une erreur si le controlleur n'existe pas ou n'est pas trouvé .*/
    
    public function getController($params) 
    {
        
        if(!isset($params['controller'])) {
            $params['controller'] = 'home';
        }
        
        $controller = ucfirst(strtolower($params['controller'])) . 'Controller';
        if(!file_exists('Controller/' . $controller . '.php' )) {
            throw new \Exception('Page non existante');
        }
        return $controller;
    }
    
    /* Fonction acceptant aussi un seul paramètre, le nom de l'action utilisée. Si aucune action n'est spécifiée, appellera automatiquement l'accueil pour afficher la homepage du site. Autrement retournera l'action utilisée/appellée . */
    
    public function getAction($params) 
    {
        
        if(!isset($params['action'])) {
            $params['action'] = 'accueil';
        }
        $action = ucfirst(strtolower($params['action'])) . 'Action';

        return $action;
    } 
    
    /* Fonction acceptant en paramètre le controlleur et l'action vérifiant simplement si le duo action/controlleur existe bel et bien, et retournera une erreur si ce n'est pas le cas. */
    
    public function checkAction($controller, $action) 
    {
            
          if(!method_exists($controller, $action)) {
              throw new \Exception($action . ': Action/Controlleur non trouvés');
          }
    }
    
}