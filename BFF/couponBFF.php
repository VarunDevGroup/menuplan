<?php 

require  __DIR__ . '\..\autoload.php';
include(__DIR__ .'\..\container.php');
include(__DIR__ . '\..\loadDependency.php');
session_start();
extract($_POST);

$postData = array();

foreach ($_POST as $key => $value) {
    $postData[$key] = $value;
}

if ($actiontype == 'GetList') {
    GetList($container,$draw,$length,$start,$search);
}
else if ($actiontype == 'InsertData') {
  InsertData($container);
}
else if ($actiontype == 'UpdateData') {
  UpdateData( $container);
}
else if ($actiontype == 'Delete') {
  //  Delete($container,$id);
}

function InsertData($container)
{
  $languageBLL = $container->get('couponBLL');
  global $postData;
  
  $dataToSent=AddNewCoupon( $_POST["couponDiscount"]);
  $returnVal= $languageBLL->InsertData($dataToSent);
  echo json_encode($returnVal);
}


function GetSingle($container,$id) {
    $languageBLL = $container->get('palBLL');
    $returnVal= $languageBLL->GetSingle($id);
    echo json_encode($returnVal);
}

function AddNewCoupon($discountPercentage)
{
  $currentDate=date("Y-m-d");
 // $currentDate= date_format($date,"Y-m-d");
  $data=[];
  $data['CouponCode'] = generateCouponCode();
  $data['CreatedBy'] = 	$_SESSION["userName"];
  $data['CreatedOn'] = $currentDate;
  $data['CouponValidity'] = GetValiditiyDate($currentDate);
  $data['CouponUsed'] = 0;
  $data['CouponAmount'] = CalculateCouponValue($discountPercentage);

  return $data;
}

function CalculateCouponValue($discountPercentage)
{
   $couponValue= 300 * floatval($discountPercentage);
  return $couponValue;
}
function UpdateData($container) {
  $languageBLL = $container->get('palBLL');
  $returnVal= $languageBLL->UpdateData($_POST);
  echo json_encode($returnVal);
}
function GetList($container,$draw,$length,$start,$search)
{
    
    $languageBLL = $container->get('couponBLL');
    $returnVal= $languageBLL->GetList($length,$start,$search);
    
    
    echo json_encode(array('draw'=>$draw,
                    'recordsTotal'=>$returnVal['recordsTotal'],
                    'recordsFiltered'=>$returnVal['recordsFiltered'],
                    'data'=>$returnVal['data']
    ));
}


function generateCouponCode($length = 8) {
    // Define the characters that can be used in the coupon code
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $couponCode = '';

    // Generate the coupon code
    for ($i = 0; $i < $length; $i++) {
        $couponCode .= $characters[rand(0, $charactersLength - 1)];
    }

    return "MP" . $couponCode;
}

function GetValiditiyDate($startDate)
{
  $date=date_create($startDate);
  date_add($date,date_interval_create_from_date_string("364 Days"));
  return date_format($date,"Y-m-d");
}


?>
