<?php
namespace BusinessAccessLayer\Implementations;
use DataAccessLayer\Interfaces\IUserInterface;
use BusinessAccessLayer\Interfaces\IUserBLL;

class UserBLL implements IUserBLL {

  private $dal;
  public function __construct(IUserInterface $dalClass)
    {
         $this->dal = $dalClass;
    }

    public function ValidateUser(string $uid, string $pwd)// : bool
    {
       
        
         $retrunvalue= $this->dal->ValidateUser($uid, $pwd);
        
        return $retrunvalue;
    }
  }
  
?>