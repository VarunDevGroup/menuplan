<?php
namespace BusinessAccessLayer\Interfaces;

interface IUserBLL {
  public function ValidateUser(string $uid, string $pwd); //: bool;
}

interface ILanguageBLL {
  public function GetLanguageList() ;
}
?>