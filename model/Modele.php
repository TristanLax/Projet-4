<?php

/* Base de modèle objet pour tous les autres modèles contenant la fonction automatisée d'hydratation des attributs et des setters. */

class Modele 
{
    /* Fonction protégée gérant l'hydratation des objets en récupérant un array de paramètres contenant les attributs avant de les hydrater automatiquement a leurs setters si ceux-ci existent. */
    
    protected function fromArray(array $params)
    {
        foreach ($params as $name => $value) {
            $setter = 'set' . ucfirst($name);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
        return $this;
    } 
    
}