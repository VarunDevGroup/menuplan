<?php
namespace BusinessAccessLayer\Interfaces;

interface IFormulaBLL {
  public function GetFormulaList($length,$start,$search); 

  
  public function GetSingle($id) ;

  public function UpdateData($data);
}


?>