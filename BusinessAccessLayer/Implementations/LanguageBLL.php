<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\ILanguageDAL;
use BusinessAccessLayer\Interfaces\ILanguageBLL;

class LanguageBLL implements ILanguageBLL {

  private $dal;
  public function __construct(ILanguageDAL $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function GetLanguageList($length,$start,$search)
    {
       
        
         $retrunvalue= $this->dal->GetLanguageList($length,$start,$search);
         return  $retrunvalue;
         

    }
  }
  
?>