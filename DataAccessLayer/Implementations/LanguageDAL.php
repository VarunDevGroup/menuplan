<?php


namespace DataAccessLayer\Implementations;

use DataAccessLayer\Interfaces\ILanguageDAL;

include(__DIR__ . "\..\..\dbconnection.php");



class LanguageDAL implements ILanguageDAL {

    public function GetLanguageList($length,$start,$search)
    {
        $conn =GetConnection();
        $totalCount = $conn->query("SELECT * FROM `languagemaster` ")->num_rows;

        $search_where = "";
        if(!empty($search)){
            $search_where = " where ";
            $search_where .= " language_name LIKE '%{$search['value']}%' ";
            $search_where .= " OR language_code LIKE '%{$search['value']}%' ";
           
        }

        $query = $conn->query("SELECT * FROM `languagemaster` {$search_where} limit {$length} offset {$start} ");
        $recordsFilterCount = $conn->query("SELECT * FROM `languagemaster` {$search_where} ")->num_rows;

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