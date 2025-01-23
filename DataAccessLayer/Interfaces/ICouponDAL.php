<?php
namespace DataAccessLayer\Interfaces;


interface ICouponDAL {
  public function GetList($length,$start,$search) ;

  public function GenerateCoupon($percentageValue) ;

  public function UpdateData($id) ;

  public function InsertData($data);
}
?>