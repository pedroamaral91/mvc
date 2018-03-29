<?php

class Funcoes
{
    static public function autoload($class)
    {
        if(!empty($class) && !is_numeric($class))
        {
            $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
            $class = explode("/", $class);
            $class[0] = strtolower($class[0]);
            $path = __DIR__ . "/../" . implode("/", $class) . ".php";            
            if(!require_once($path))
                echo "Não foi possível localizar o namespace " . $path . "<hr>"; 
        }
    }
}
spl_autoload_register(array('Funcoes', 'autoload'));