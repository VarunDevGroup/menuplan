<?php
namespace DataAccessLayer\Interfaces;


interface IFoodItemsDAL {
  public function GetFoodItemsList($length,$start,$search,$foodsectionid) ;
}
?>