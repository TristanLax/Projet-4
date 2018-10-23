<?php
    
require('\Autoloader.php');
Projet_4\Autoloader::register();
    

class Controller {
    
        public function blog() {
        
            if (isset($_GET['action'])){
            $this->action = $_GET['action'];
            $this->action();
        }
            else if(isset($_GET['signaler'])) {
                $this->signaler();
            }
    }
    
    public function action() {
        
        if ($this->action == 'loginAction') {
            $this->loginAction();
        }

    }
}