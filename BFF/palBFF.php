<?php 

require  __DIR__ . '\..\autoload.php';
include(__DIR__ .'\..\container.php');
include(__DIR__ . '\..\loadDependency.php');

extract($_POST);

$postData = array();

foreach ($_POST as $key => $value) {
    $postData[$key] = $value;
}

if ($actiontype == 'GetList') {
    GetPALList($container,$draw,$length,$start,$search);
}
else if ($actiontype == 'GetSingle') {
    GetSingle($container,$id);
}
else if ($actiontype == 'UpdateData') {
  UpdateData( $container);
}
else if ($actiontype == 'Delete') {
  //  Delete($container,$id);
}

function GetSingle($container,$id) {
    $languageBLL = $container->get('palBLL');
    $returnVal= $languageBLL->GetSingle($id);
    echo json_encode($returnVal);
}

function UpdateData($container) {
  $languageBLL = $container->get('palBLL');
  $returnVal= $languageBLL->UpdateData($_POST);
  echo json_encode($returnVal);
}
function GetPALList($container,$draw,$length,$start,$search)
{
    
    $languageBLL = $container->get('palBLL');
    $returnVal= $languageBLL->GetPALList($length,$start,$search);
    
    
    echo json_encode(array('draw'=>$draw,
                    'recordsTotal'=>$returnVal['recordsTotal'],
                    'recordsFiltered'=>$returnVal['recordsFiltered'],
                    'data'=>$returnVal['data']
    ));
}
?>
