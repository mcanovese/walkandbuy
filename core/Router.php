<?php

namespace Core;

class Router {

  public $routes = [

    'GET' =>[],
    'POST'=>[]

  ];


  public static function load($file)
  {

    $router = new static;
    require $file;
    return $router;
  }



  public function get($uri, $controller)
  {
    $this->routes['GET'][$uri]=$controller;

  }


  public function post($uri, $controller)
  {
    $this->routes['POST'][$uri]=$controller;

  }

  public function direct($uri, $requestType)
  {
      if (array_key_exists($uri, $this->routes[$requestType])) {

          return $this->callAction(
          ...explode('@',$this->routes[$requestType][$uri])
          //i tre puntini mi permettono di convertire
          // elementi array in args della funzione
          );
      }

      throw new Exception('No route defined for this URI.');
  }

  private function callAction(string $controller, string $action) {
    require_once "app/controller/{$controller}.php";

    $name = "App\\Controller\\{$controller}";
    $instance = new $name;

    if (!\method_exists($instance, $action)) {
      throw new Exception("{$action} does not exist on controller {$controller}");
    }

    return $instance->$action();
  }


}


 ?>
