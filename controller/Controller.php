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
            else if(isset($_GET['supprimer'])) {
                $this->supprimer();
            }
            else if(isset($_GET['ignorer'])) {
                $this->ignorer();
            }
            else if(isset($_GET['moderer'])) {
                $this->moderer();
            }
    }
    
    public function action() {
        
        if ($this->action == 'loginAction') {
            $this->loginAction();
        }
        if ($this->action == 'modifier') {
            $this->modifier();
        }
        if ($this->action == 'envoyer') {
            $this->envoyer();
        }

    }
}