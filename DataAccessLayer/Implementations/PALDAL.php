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

   
  }
  
?>