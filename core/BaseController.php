<?php

namespace Core;

abstract class BaseController
{
    protected $render;
    private $viewPath;
    private $layoutPath;

    public function __construct()
    {
        $this->render = new \stdClass;
    }

    public function renderView($view, $layout = null)
    {
        $this->viewPath = $view;
        $this->layoutPath = $layout;
        if($layout) {
            $this->layout();
        } else {
            $this->content();
        }
    }

    public function content()
    {
        if(file_exists(__DIR__ . "/../app/Views/$this->viewPath.php"))
            require_once(__DIR__ . "/../app/Views/$this->viewPath.php");
        else
            echo "Não foi possível localizar a view " . __DIR__ . "/../app/Views/$this->viewPath.php";
    }

    public function layout()
    {
        if(file_exists(__DIR__ . "/../app/Views/$this->layoutPath.php"))
            require_once(__DIR__ . "/../app/Views/$this->layoutPath.php");
        else
            echo "Não foi possível localizar a view " . __DIR__ . "/../app/Views/$this->layoutPath.php";
    }

    public function addJs($file)
    {
        if(!empty($file)) {
            $file = str_replace("php", "js", $file);
            $file = "/assets/js/" . $file;
            return $file;
        }
    }
    public function addCss($file)
    {
        $file = str_replace("php", "css", $file);
        $file = explode("/", $file);
        $path = $file[8] ."/". $file[9];
        
        $path = "/assets/css/" . $path;
        return $path;
        
    }

}