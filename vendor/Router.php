<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author user76
 */
use app\controllers;
namespace vendor;
 use \app\controllers;
class Router
{
    private $routes;
    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    private function GetUri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
    
    public function Run()
    {
        $uri = $this->GetUri();
        foreach($this->routes as $pattern=>$elem)
        {
            if(preg_match("~$pattern~", $uri)  == 1)
            { 
                $Interval = preg_replace("~$pattern~", $elem, $uri);
             
                $segments = explode('/', $Interval);
         
                $controllerClass = ucfirst(array_shift($segments).'Controller');
                $Action = 'Action'.array_shift($segments);
                 
                $controller = '\app\controllers\\'.$controllerClass;
                
                if(class_exists($controller))
                {
                    $ControllerObject = new  $controller;
                }
                else
                {
                 echo 'Controller not found';
                }
                  
                $res =  call_user_func_array(array( $ControllerObject,$Action), $segments);
                if($res)
                {
                   break;
                }
                
                
            }
        }
    }
}