<?php

class Config
{
    
    public static $parameters;
    
    
    protected static function getConfigFile()
    {
        if (file_exists('Config/dev.ini')) {
            return 'Config/dev.ini';
        }
        return 'Config/prod.ini';
    }
    
    protected static function getParams()
    {
        if (null !== self::$parameters) {
            return self::$parameters;
        }
        $pathfile = static::getConfigFile();
        self::$parameters = parse_ini_file($pathfile);
        return self::$parameters;
        
    } 
    
    protected static function getParam($param)
    {
        $parameters = self::getParams();
        if (!isset($parameters[$param])) {
            return null;
        }
        return $parameters[$param];
    }

}