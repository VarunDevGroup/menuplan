<?php
namespace BusinessAccessLayer\Interfaces;

interface IFooditemsBLL {
  public function GetFoodItemsList($length,$start,$search,$foodsectionid); 
}


?>