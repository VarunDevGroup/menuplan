<?php
namespace DataAccessLayer\Interfaces;


interface IFoodSectionDAL {
  public function GetFoodSectionList($length,$start,$search) ;
}
?>