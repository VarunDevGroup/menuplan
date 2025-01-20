<?php
namespace BusinessAccessLayer\Interfaces;

interface IPALBLL {
  public function GetPALList($length,$start,$search); 

  public function GetSingle($id) ;

  public function UpdateData($data);

}


?>