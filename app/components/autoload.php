<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

spl_autoload_register(function($class)
{
    $file = ROOT.'/'.$class.'.php';
    $file  = str_replace('\\', '/', $file);
     
    if(file_exists($file))
    {  
       
        include($file);
    }
    
});