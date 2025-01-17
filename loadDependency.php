<?php


use DataAccessLayer\Implementations\UserDAL;
use BusinessAccessLayer\Implementations\UserBLL;
use DataAccessLayer\Implementations\LanguageDAL;
use BusinessAccessLayer\Implementations\LanguageBLL;
use BusinessAccessLayer\Implementations\PALBLL;
use DataAccessLayer\Implementations\PALDAL;

$container = new Container();

	$container->set('userdb', function () {
		return new UserDAL();
	});

	$container->set('userbll', function ($container) {
		
		$db = $container->get('userdb');
	
		return new UserBLL($db);
	});

	$container->set('lngDAL', function () {
		return new LanguageDAL();
	});

	$container->set('lngBLL', function ($container) {
		
		$db = $container->get('lngDAL');
	
		return new LanguageBLL($db);
	});

	$container->set('palDLL', function () {
		return new PALDAL();
	});

	$container->set('palBLL', function ($container) {
		
		$db = $container->get('palDLL');
	
		return new PALBLL($db);
	});


?>