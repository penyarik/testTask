<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Date
 *
 * @author user76
 */
namespace app\models;


class Date extends \vendor\File{
     
    public function takeDates()
    {
        return $this->fileDate;
    }
    
}
