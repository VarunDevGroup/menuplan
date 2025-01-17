<?php 

require  __DIR__ . '\..\autoload.php';
include(__DIR__ .'\..\container.php');
include(__DIR__ . '\..\loadDependency.php');

extract($_POST);

$languageBLL = $container->get('lngBLL');
$returnVal= $languageBLL->GetLanguageList($length,$start,$search);

echo json_encode(array('draw'=>$draw,
                'recordsTotal'=>$returnVal['recordsTotal'],
                'recordsFiltered'=>$returnVal['recordsFiltered'],
                'data'=>$returnVal['data']
));
?>
