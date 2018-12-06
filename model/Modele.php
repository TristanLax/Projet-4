<?php


class Modele 
{
    
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