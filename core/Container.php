<?php
namespace Core;

abstract class Container
{
    static public function newController($c)
    {
        if(!empty($c)) {
            $c = "\\App\\Controllers\\" . $c;
            return new $c;
        }
    }
    static public function model($m, $conn)
    {
        if(!empty($m)) {
            $m = "\\App\\Models\\" . $m;            
            return new $m($conn);
        }
    }
}