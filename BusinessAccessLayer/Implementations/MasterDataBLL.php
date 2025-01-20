<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\IMasterDataDAL;
use BusinessAccessLayer\Interfaces\IMasterDataBLL;

class MasterDataBLL implements IMasterDataBLL {

  private $dal;
  public function __construct(IMasterDataDAL $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function GetMasterData($length,$start,$search)
    {
       
        
         $retrunvalue= $this->dal->GetMasterData($length,$start,$search);
         return  $retrunvalue;
         

    }
  }
  
?>