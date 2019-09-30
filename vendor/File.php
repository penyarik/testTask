<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace vendor;

/**
 * Description of File
 *
 * @author user76
 */
abstract class File {
    
     public $fileDate;
    
    public function __construct() {
         
        $filePath  = str_replace('\\', '/', ROOT.'/vendor/files/input.txt');
        if(file_exists($filePath))
        {
            $this->fileDate = file_get_contents($filePath);
            
        }
        else{
            echo 'File dont found';
        }
         
    }
    
}
