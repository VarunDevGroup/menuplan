<?php 

require  __DIR__ . '\..\autoload.php';
include(__DIR__ .'\..\container.php');
include(__DIR__ . '\..\loadDependency.php');

extract($_POST);

$languageBLL = $container->get('foodsectionBLL');
$returnVal= $languageBLL->GetFoodSectionList($length,$start,$search);

echo json_encode(array('draw'=>$draw,
                'recordsTotal'=>$returnVal['recordsTotal'],
                'recordsFiltered'=>$returnVal['recordsFiltered'],
                'data'=>$returnVal['data']
));
?>
