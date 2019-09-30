<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sort
 *
 * @author user76
 */
namespace app\components;

class Sort {
    
     
    
    public $category = [];
    public $childs = [];
    
     
    const PARENT_CATEGORY_MASS = array(
       '1' => array('name' => 'NUMBERS', 'id' => 1), 
       '2' => array('name' => 'ANIMALS', 'id' => 2)
        );
       
    
    
    
    
    public function sortDates($dates)
    {
        $arr = explode("\r\n", $dates);
         
        $count = count($arr);
      
         $flag = 1; 
         for($i = 0; $i <= $count-1; $i++)
         {
            
             foreach(self::PARENT_CATEGORY_MASS as $elem)
             {
                 if($arr[$i] == $elem['name'])
                 {
                      $flag = $elem['id'];
                      
                 }
                  
             }
              
             foreach(self::PARENT_CATEGORY_MASS as $elem)
             {
                 if($flag == $elem['id'])
                 {
                      
                     ${$elem['name']}[] = $arr[$i]; 
                      
                      
                 }
                  
             }
         }
         
        $this->animalsSort($ANIMALS);
        $this->numbersSort($NUMBERS);
     
      
    }
    private function animalsSort($animals)
    {
             
       $animals = $this->deleteRepeatElem($animals);
       $key = $this->getKey('ANIMALS');
       $this->category[$key] = $animals[0]; unset($animals[0]);
       asort($animals);
       $animals = $this->updateMass($animals);
       $this->childs[$key] = $animals;
        
       
         
      }
        
      private function numbersSort($numbers)
      { 
          $key = $this->getKey('NUMBERS');
          $cat_name = $numbers[0];      
          $this->category[$key] = $cat_name;
          $numbers = $this->deleteRepeatCat($numbers, $cat_name);
          $numbers = $this->updateMass($numbers);
          $numbers = $this->countRepeatElem($numbers);
          
          $this->childs[$key] = $numbers;
         
          
      }
      
     
      private function deleteRepeatElem($arr)
      {
         
       $count = count($arr);
        for($i = 0; $i < $count; $i++)
        {
          if(isset($arr[$i]))
          {
            $elem = $arr[$i];
          }
            for($j = $i+1; $j < $count; $j++)
            {
               if(isset($arr[$j]) && $elem == $arr[$j])
               {
                   unset($arr[$j]);
               }
               
            }
            if(empty($arr[$i]))
            {
                unset($arr[$i]);
            }
        }
        return $arr;
      }
      
      private function countRepeatElem($arr)
      {
           
          $count = count($arr);
          $arr_new = [];
          for($i = 0; $i < $count; $i++)
          {   
               $elem_count = 1;
              if(isset($arr[$i]))
              {
               $elem = $arr[$i];
              }
           
              for($j = $i+1; $j < $count; $j++)
              {
                if(isset($arr[$j]) && $elem == $arr[$j])
                  {
                     $elem_count++;
                     unset($arr[$j]);
                  
                  }
                
              }
              if(isset($arr[$i]))
              {
               $arr_new[] = $arr[$i].'-count:'.$elem_count;
              }
          }
          return $arr_new;  
      }
      private function deleteRepeatCat($arr,$cat_name)
      {
           for($i = 0; $i < count($arr); $i++)
          {
              if($arr[$i] == $cat_name)
              {
                  unset($arr[$i]);
              }
          }
          return $arr;
      }
      
       
      private function updateMass($arr)
      {
          $count = count($arr);
          $new_arr = [];
          $i = -1;
          foreach($arr as $elem)
          {   
              $i++;
              $new_arr[$i] =  $elem;
          }
          
          return $new_arr;
      }
     
      private function getKey($name)
      {
          foreach(self::PARENT_CATEGORY_MASS as $elem)
          {
              if($elem['name'] == $name)
              {
                  $key = $elem['id'];
              }
          }
          return $key;
      }
}
