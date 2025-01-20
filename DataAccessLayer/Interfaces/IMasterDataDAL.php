<?php
namespace DataAccessLayer\Interfaces;


interface IMasterDataDAL {
  public function GetMasterData($length,$start,$search) ;
}
?>