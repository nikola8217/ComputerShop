<?php
if(isset($_POST["dodaj"]))  
{  
  if(isset($_SESSION["shopping_cart"]))  
  {  
   $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
   if(!in_array($_GET["id"], $item_array_id))  
   {  
    $count = count($_SESSION["shopping_cart"]);  
    $item_array = array(  
     'item_id'               =>     $_GET["id"],  
     'korime'  =>  $_GET["korime"],
     'marka'               =>     $_POST["marka"],  
     'cena'          =>     $_POST["cena"],  
     'kolicina'          =>     $_POST["kolicina"]  
   );  
    $_SESSION["shopping_cart"][$count] = $item_array;
    $odg = '<p class="bg-info" style="text-align:center;">Proizvod je dodat u korpu!</p>';
  }  
  else  
  {  
    $odg = '<p class="bg-danger" style="text-align:center;">Proizvod je vec u korpi!</p>';
  }  
}  
else  
{  
 $item_array = array(  
   'item_id'               =>     $_GET["id"],  
   'korime'  =>  $_GET["korime"],
   'marka'               =>     $_POST["marka"],  
   'cena'          =>     $_POST["cena"],  
   'kolicina'          =>     $_POST["kolicina"]  
 );  
 $_SESSION["shopping_cart"][0] = $item_array;  
}  
}

?>