<?php
namespace DataAccessLayer\Interfaces;


interface ILanguageDAL {
  public function GetLanguageList($length,$start,$search) ;
}
?>