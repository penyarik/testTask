<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainController
 *
 * @author user76
 */
namespace app\controllers;

class MainController {
     public function actionIndex()
     {
         $fileDateObj = new \app\models\Date();
         $dates = $fileDateObj->takeDates();
         $sort = new \app\components\Sort();
         $sort->sortDates($dates);
         
         $under_cat = $sort->childs;
         $cat = $sort->category;
          
         require_once ROOT.'/app/view/view.php';
         
         
     }
}
