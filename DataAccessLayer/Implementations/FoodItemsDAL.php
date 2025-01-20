<?php


namespace DataAccessLayer\Implementations;

use DataAccessLayer\Interfaces\IFoodItemsDAL;

include(__DIR__ . "\..\..\dbconnection.php");


class FoodItemsDAL implements IFoodItemsDAL {

    public function GetFoodItemsList($length, $start, $search, $foodsectionid)
    {
      
   
        $conn =GetConnection();
        if($foodsectionid==0){
            $totalCount = $conn->query("SELECT * FROM `tblfooditems` ")->num_rows;
        }else{
            $totalCount = $conn->query("SELECT * FROM `tblfooditems` where `FoodSectionID`={$foodsectionid} ")->num_rows;
        }

        $search_where = "";
        if(!empty($search)){
            $search_where = " where ";
            $search_where .= " FoodItemName LIKE '%{$search['value']}%' ";
           
        }
        if($foodsectionid!=0){
           $search_where .=" AND `FoodSectionID`={$foodsectionid}";
        }
        
        $query = $conn->query("SELECT * FROM `tblfooditems` {$search_where} limit {$length} offset {$start} ");
        $recordsFilterCount = $conn->query("SELECT * FROM `tblfooditems` {$search_where} ")->num_rows;

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