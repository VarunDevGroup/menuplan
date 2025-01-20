<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\IFoodSectionDAL;
use BusinessAccessLayer\Interfaces\IFoodSectionBLL;

class FoodSectionBLL implements IFoodSectionBLL {

  private $dal;
  public function __construct(IFoodSectionDAL $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function GetFoodSectionList($length,$start,$search)
    {
       
        
         $retrunvalue= $this->dal->GetFoodSectionList($length,$start,$search);
         return  $retrunvalue;
         

    }
  }
  
?>