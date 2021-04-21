<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	define('ROOT', dirname(__DIR__));
	define('WEBSITE_URL', 'http://my-kingdom.com/');

	Require_once ROOT . '/api/mvc/app/Autoloader.php';
	app\Autoloader::register();

	 $page = 'home';

	 if (isset($_GET['page'])) {
		 $page = $_GET['page'];
	 }

	 $nameController = 'app\controller\\'.ucfirst($page).'Controller';

	 if (!class_exists($nameController) || !method_exists($nameController, 'render')){
	     header('Location: '.WEBSITE_URL);
	 }

	$controller = new $nameController;
 	$controller->render();

?>
