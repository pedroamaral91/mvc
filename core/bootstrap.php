<?php

if(!session_id())
    session_start();

use Core\Route;

$routes = require_once(__DIR__ . "/../app/routes.php");

$r = new Route($routes);
