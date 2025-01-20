<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\IFormulaDAL;
use BusinessAccessLayer\Interfaces\IFormulaBLL;

class FormulaBLL implements IFormulaBLL {

  private $dal;
  public function __construct(IFormulaDAL $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function GetFormulaList($length, $start, $search)
    {
       
        
         $retrunvalue= $this->dal->GetFormulaList($length,$start,$search);
         return  $retrunvalue;
         

    }
    public function GetSingle($id)
    {
      $retrunvalue= $this->dal->GetSingle($id);
      return  $retrunvalue;
    }

    public function UpdateData($data)
    {
      $retrunvalue= $this->dal->UpdateData($data);
      return  $retrunvalue;
    }
  }
  
?>