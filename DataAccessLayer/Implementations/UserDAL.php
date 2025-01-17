<?php


namespace DataAccessLayer\Implementations;
use DataAccessLayer\Interfaces\IUserInterface;

include("./dbconnection.php");


class UserDAL implements IUserInterface {



   
    public function ValidateUser(string $uid, string $pwd) : bool
    {

      $conn =GetConnection();
      
      $search_where = " where ";
      $search_where .= " `emailaddress` = '{$uid}' ";
      $search_where .= " AND `password` = '{$pwd}' ";
      
      $resultSet = $conn->query("SELECT * FROM `users` {$search_where}");
      $recordsFilterCount =$resultSet->num_rows;

      //return true;
      if ($recordsFilterCount==0 or empty($recordsFilterCount) or is_null($recordsFilterCount))
      {
           return false;
      }
      else
      {
       
          $row = $resultSet->fetch_assoc();
          $_SESSION["userName"]=$row["firstname"] . " " . $row["lastname"];
          $_SESSION["userid"]=$row["userid"] ;
         
      
          return true;
      }
     
    }
  }
  
?>