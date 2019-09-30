<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
define('ROOT', dirname(__DIR__));

require_once ROOT.'/app/components/autoload.php';

$router = new vendor\Router();
$router ->Run();
