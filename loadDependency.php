<?php

use BusinessAccessLayer\Implementations\FoodItemsBLL;
use BusinessAccessLayer\Implementations\FoodSectionBLL;
use BusinessAccessLayer\Implementations\FormulaBLL;
use DataAccessLayer\Implementations\UserDAL;
use BusinessAccessLayer\Implementations\UserBLL;
use DataAccessLayer\Implementations\LanguageDAL;
use BusinessAccessLayer\Implementations\LanguageBLL;
use BusinessAccessLayer\Implementations\MasterDataBLL;
use BusinessAccessLayer\Implementations\PALBLL;
use DataAccessLayer\Implementations\FoodItemsDAL;
use DataAccessLayer\Implementations\FoodSectionDAL;
use DataAccessLayer\Implementations\FormulaDAL;
use DataAccessLayer\Implementations\MasterDataDAL;
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

	$container->set('masterDAL', function () {
		return new MasterDataDAL();
	});

	$container->set('masterBLL', function ($container) {
		
		$db = $container->get('masterDAL');
	
		return new MasterDataBLL($db);
	});

	$container->set('formulaDAL', function () {
		return new FormulaDAL();
	});

	$container->set('formulaBLL', function ($container) {
		
		$db = $container->get('formulaDAL');
	
		return new FormulaBLL($db);
	});

	$container->set('foodsectionDAL', function () {
		return new FoodSectionDAL();
	});

	$container->set('foodsectionBLL', function ($container) {
		
		$db = $container->get('foodsectionDAL');
	
		return new FoodSectionBLL($db);
	});

	$container->set('foodItemsDAL', function () {
		return new FoodItemsDAL();
	});

	$container->set('foodItemsBLL', function ($container) {
		
		$db = $container->get('foodItemsDAL');
	
		return new FoodItemsBLL($db);
	});
?>