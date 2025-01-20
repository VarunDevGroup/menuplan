<?php
namespace DataAccessLayer\Interfaces;


interface IFormulaDAL {
  public function GetFormulaList($length,$start,$search) ;

  
  public function GetSingle($id) ;

  public function UpdateData($id) ;
}
?>