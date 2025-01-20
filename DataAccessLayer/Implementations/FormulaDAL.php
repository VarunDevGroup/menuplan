<?php


namespace DataAccessLayer\Implementations;

use DataAccessLayer\Interfaces\IFormulaDAL;

include(__DIR__ . "\..\..\dbconnection.php");


class FormulaDAL implements IFormulaDAL {

    public function GetFormulaList($length, $start, $search)
    {
      
   
        $conn =GetConnection();
        $totalCount = $conn->query("SELECT * FROM `tblformulaconfiguration` ")->num_rows;

        $search_where = "";
        if(!empty($search)){
            $search_where = " where ";
            $search_where .= " formulaname LIKE '%{$search['value']}%' ";
           
        }

        $query = $conn->query("SELECT * FROM `tblformulaconfiguration` {$search_where} limit {$length} offset {$start} ");
        $recordsFilterCount = $conn->query("SELECT * FROM `tblformulaconfiguration` {$search_where} ")->num_rows;

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
     $update = $conn->query("UPDATE `tblformulaconfiguration` set `FormulaForMale` = '{$data['FormulaForMale']}',`FormulaForFemale` = '{$data['FormulaForFemale']}',`FormulaForOther` = '{$data['FormulaForOther']}'  where rowid = '{$data['RowID']}'");
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
        

     $query = $conn->query("SELECT * FROM `tblformulaconfiguration` {$search_where}");
     $recordsFilterCount = $conn->query("SELECT * FROM `tblformulaconfiguration` {$search_where} ")->num_rows;

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