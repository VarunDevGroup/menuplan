<?php


namespace DataAccessLayer\Implementations;

use DataAccessLayer\Interfaces\IPALDAL;

include(__DIR__ . "\..\..\dbconnection.php");


class PALDAL implements IPALDAL {

    public function GetPALList($length, $start, $search)
    {
      
   
        $conn =GetConnection();
        $totalCount = $conn->query("SELECT * FROM `palmaster` ")->num_rows;

        $search_where = "";
        if(!empty($search)){
            $search_where = " where ";
            $search_where .= " palname LIKE '%{$search['value']}%' ";
           
        }

        $query = $conn->query("SELECT * FROM `palmaster` {$search_where} limit {$length} offset {$start} ");
        $recordsFilterCount = $conn->query("SELECT * FROM `palmaster` {$search_where} ")->num_rows;

        $data = array();
        while($row = $query->fetch_assoc()){
           $data[] = $row;
         }  
         $out=array();
         $out['recordsTotal']=$totalCount;
         $out['recordsFiltered']=$recordsFilterCount;
         $out['data']=$data;

         return $out;

    }
    
     public function UpdateData($data)
     {
      $out=array();
      $conn =GetConnection();
      $update = $conn->query("UPDATE `palmaster` set `palformula` = '{$data['palformula']}' where rowid = '{$data['rowid']}'");
    if($update){
      $out['status'] = 'success';
    }else{
      $out['status'] = 'failed';
      $out['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
      }
      return $out;

     }

    public function GetSingle($id)
    {
      $conn =GetConnection();
      
      $search_where = " where ";
      $search_where .= " rowid = '{$id}' ";
         

      $query = $conn->query("SELECT * FROM `palmaster` {$search_where}");
      $recordsFilterCount = $conn->query("SELECT * FROM `palmaster` {$search_where} ")->num_rows;

      $out=array();
      if($query){
        $out['status'] = 'success';
        $out['data'] = $query->fetch_array();
    }else{
        $out['status'] = 'success';
        $out['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
    }

       return $out;
    }

   
  }
  
?>