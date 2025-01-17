<?php
namespace DataAccessLayer\Interfaces;

 interface IUserInterface {
  public function ValidateUser(string $username, string $password) : bool;
}

interface ILanguageDAL {
  public function GetLanguageList() ;
}
?>