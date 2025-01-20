<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\IFoodItemsDAL;
use BusinessAccessLayer\Interfaces\IFooditemsBLL;

class FoodItemsBLL implements IFooditemsBLL {

  private $dal;
  public function __construct(IFoodItemsDAL $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function GetFoodItemsList($length,$start,$search,$foodsectionid)
    {
       
        
         $retrunvalue= $this->dal->GetFoodItemsList($length,$start,$search,$foodsectionid);
         return  $retrunvalue;
         

    }
  }
  
?>