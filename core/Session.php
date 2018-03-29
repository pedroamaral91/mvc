<?php
namespace Core;

class Session
{
    static public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    static public function get($key)
    {
        if(@$_SESSION[$key])
            return $_SESSION[$key];
        else
            return false;
    }

    static public function destroy($key)
    {
        if(is_array($key))
            foreach($key as $k) 
                unset($_SESSION[$k]);
         else 
            unset($_SESSION[$key]);
        
    }
}