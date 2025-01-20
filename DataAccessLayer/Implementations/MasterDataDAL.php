<?php


namespace DataAccessLayer\Implementations;

use DataAccessLayer\Interfaces\IMasterDataDAL;

include(__DIR__ . "\..\..\dbconnection.php");


class MasterDataDAL implements IMasterDataDAL {

    public function GetMasterData($length, $start, $search)
    {
      
   
        $conn =GetConnection();
        $totalCount = $conn->query("SELECT * FROM `masterdata` ")->num_rows;

        $search_where = "";
        if(!empty($search)){
            $search_where = " where ";
            $search_where .= " master_item_name LIKE '%{$search['value']}%' ";
           
        }

        $query = $conn->query("SELECT * FROM `masterdata` {$search_where} limit {$length} offset {$start} ");
        $recordsFilterCount = $conn->query("SELECT * FROM `masterdata` {$search_where} ")->num_rows;

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