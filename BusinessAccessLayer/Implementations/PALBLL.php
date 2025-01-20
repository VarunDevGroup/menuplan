<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\IPALDAL;
use BusinessAccessLayer\Interfaces\IPALBLL;

class PALBLL implements IPALBLL {

  private $dal;
  public function __construct(IPALDAL $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function GetPALList($length,$start,$search)
    {
       
        
         $retrunvalue= $this->dal->GetPALList($length,$start,$search);
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