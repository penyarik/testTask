<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'layout/header.php';
 
 

?>
<br></br>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>View</title>
  <style type="text/css">
   
  </style>
 </head>
 <body>
     
      
  <div id="menu">

    <ul>
    <?php foreach($cat as $key=>$elem):?>
       
        <li><a href="#"> <?php echo $elem;?></a></li>
            <ul> 
                <?php $i = 0;?>
                <?php foreach($under_cat as $kkey => $elems):?>
                 
                <?php if($kkey == $key): ?>
                   <?php foreach($elems as $ele):?>
                <li><a href="#"><?php echo $ele; ?></a></li>
                    <?php endforeach;?>
                <?php endif;?>
               <?php endforeach;?>
           </ul>
     <?php endforeach;?>                             
     

       
    </ul>

</div>

 
</body>
</html>
<?php
require_once 'layout/footer.php';
