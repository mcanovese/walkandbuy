<?php
    namespace App\Core;
    class Router {

      * @var array
      */
     public $routes = [
         'GET' => [],
         'POST' => []
     ];


    protected $routes = [];

    public function define($routes)

    {

        $this->routes = $routes;
    }


    public function direct($uri)

    {
        if(array_key_exists($uri, $this->routes)) {

            return $this->routes[$uri];
        }
         throw new Exception('No route defined for this URI.');
    }






}
