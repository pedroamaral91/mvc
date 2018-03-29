<?php

namespace Core;

abstract class Redirect
{
    static public function url($url, $with = [])
    {
        if(count($with) > 0)
            foreach($with as $key => $value)
                Session::set($key, $value);
                
        return header("location:{$url}");
    }
}