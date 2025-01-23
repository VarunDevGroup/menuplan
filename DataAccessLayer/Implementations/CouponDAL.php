<?php


namespace DataAccessLayer\Implementations;

use DataAccessLayer\Interfaces\ICouponDAL;

include(__DIR__ . "\..\..\dbconnection.php");


class CouponDAL implements ICouponDAL {

    public function GetList($length, $start, $search)
    {
      
   
        $conn =GetConnection();
        $totalCount = $conn->query("SELECT 1 FROM `tblcouponsmaster` ")->num_rows;

        $search_where = "";
        if(!empty($search)){
            $search_where = " where ";
            $search_where .= " CouponCode LIKE '%{$search['value']}%' ";
           
        }

        $query = $conn->query("SELECT CouponID, CouponCode,date_format(VaildityDate,'%Y-%m-%d') as VaildityDate, CouponAmount,if(couponused=0,'No','Yes') as CouponUsed FROM `tblcouponsmaster` {$search_where} order by `CouponId` desc limit {$length} offset {$start} ");
        $recordsFilterCount = $conn->query("SELECT * FROM `tblcouponsmaster` {$search_where} ")->num_rows;

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
    
    public function InsertData($data)
    {
      $conn =GetConnection();

      $sql="INSERT INTO `menuplandb`.`tblcouponsmaster` ( `CouponCode`, `CreatedBy`, `CreatedOn`, `CouponUsed`, `CouponAmount`, `VaildityDate`)";
      $sql.= " VALUES ('" . $data['CouponCode'] . "','" . $data['CreatedBy'] . "','" . $data['CreatedOn'] . "'," . $data['CouponUsed'] . "," . $data['CouponAmount'] .  ",'" . $data['CouponValidity'] ."')";

      $query = $conn->query( $sql);

    if($query){
        $resp['status'] = 'success';
    }else{
      $resp['status'] = 'failed';
      $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
      }
      $resp['status'] = 'success';
 
return $resp; 

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

     public function GenerateCoupon($percentageValue)
      {
      return "";

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