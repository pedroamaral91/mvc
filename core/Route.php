<?php

namespace Core;

class Route
{
    private $routes;

    public function __construct($routes)
    {
           $this->setRoutes($routes);
           $this->run();
    }
    private function getUrL()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    private function getRequest()
    {
        $request = new \stdClass;
        foreach($_GET as $key => $value) {
            @$request->get->$key = $value;
        }
        foreach($_POST as $key => $value) {
            @$request->post->$key = $value;
        }
        return $request;
    }
    private function setRoutes($routes)
    {
        foreach($routes as $route) {
            $r = explode("@", $route[1]);
            $rN[] = [$route[0], $r[0], $r[1]];            
        }
        $this->routes = $rN;
    }

    private function run()
    {
        $url = $this->getUrl();
        $urlArray = explode("/", $url);
        foreach($this->routes as $route) {
            $r = explode("/", $route[0]);
            $params = array();
            for($i = 0; $i < count($r); $i++) {
                if(strpos($r[$i], "{") !== false && count($r) === count($urlArray)) {
                    $r[$i] = $urlArray[$i];
                    $params[] = $urlArray[$i]; 
                }
            }
            $route[0] = implode("/", $r);
            if($url === $route[0]) {
                $found = true;
                $controller = $route[1];
                $action = $route[2];
                break;
            }
        }
        if(isset($found) && $found === true) {
            $c = Container::newController($controller);
            switch(count($params)) {
                case 1:
                    $c->$action($params[0], $this->getRequest());
                    break;
                case 2:
                    $c->$action($parmas[0], $params[1], $this->getRequest());
                    break;
                default:
                    $c->$action($this->getRequest());
            }
        } else {
            echo "Não foi possível localizar a rota -> " . $url;
        }
    }
}