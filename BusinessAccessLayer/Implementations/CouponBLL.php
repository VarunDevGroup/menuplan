<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\ICouponDAL;
use BusinessAccessLayer\Interfaces\ICouponBLL;

class CouponBLL implements ICouponBLL {

  private $dal;
  public function __construct(ICouponDAL $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function InsertData($data)
    {
      $retrunvalue= $this->dal->InsertData($data);
      return  $retrunvalue;
    }
    public function GetList($length,$start,$search)
    {
       
        
         $retrunvalue= $this->dal->GetList($length,$start,$search);
         return  $retrunvalue;
         

    }

    public function GetSingle($id)
    {
     // $retrunvalue= $this->dal->GetSingle($id);
    //  return  $retrunvalue;
    }

    public function UpdateData($data)
    {
      $retrunvalue= $this->dal->UpdateData($data);
      return  $retrunvalue;
    }

  }
  
?>