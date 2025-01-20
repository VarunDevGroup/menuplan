<?php
namespace DataAccessLayer\Interfaces;


interface IPALDAL {
  public function GetPALList($length,$start,$search) ;

  public function GetSingle($id) ;

  public function UpdateData($id) ;
}
?>