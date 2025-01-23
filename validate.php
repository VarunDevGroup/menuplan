<?php
require 'autoload.php';
include('container.php');
include('loadDependency.php');
use DataAccessLayer\Implementations\UserDAL;
use BusinessAccessLayer\Implementations\UserBLL;


session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//extract($_POST);

    $uid = $_POST['Email'];
    $pwd = $_POST['Password'];

	$userBLL = $container->get('userbll');
	$returnVal= $userBLL->ValidateUser($uid, $pwd);

    if ($returnVal)
	{
		
		$_SESSION["loggedin"]=true;
		$_SESSION["userName"]="1";
		header('Location: home.php');
	}
	else
	{
		header('Location: login.php?msg=LoginFailed');
	}

}
?>

