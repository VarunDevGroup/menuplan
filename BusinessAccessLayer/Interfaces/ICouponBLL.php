<?php
namespace BusinessAccessLayer\Interfaces;

interface ICouponBLL {
  public function GetList($length,$start,$search); 

  public function InsertData($data);
  
  //public function GetSingle($id) ;

  //public function UpdateData($data);

}


?>