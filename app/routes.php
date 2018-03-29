<?php

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/erro', 'HomeController@erro'];
$routes[] = ['/clientes', 'ClientesController@index'];
$routes[] = ['/clientes/{id}/show', 'ClientesController@show'];
$routes[] = ['/clientes/cadastro', 'ClientesController@cadastro'];
$routes[] = ['/clientes/salvar', 'ClientesController@salvar'];
$routes[] = ['/clientes/{id}/editar', 'ClientesController@editar'];
$routes[] = ['/clientes/{id}/update', 'ClientesController@update'];
$routes[] = ['/clientes/{id}/delete', 'ClientesController@delete'];
$routes[] = ['/clientes/search', 'ClientesController@search'];

return $routes;