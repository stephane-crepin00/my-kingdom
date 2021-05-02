<?php header('Access-Control-Allow-Origin: *');

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	define('ROOT', dirname(__DIR__));
	define('WEBSITE_URL', 'http://my-kingdom.com/');

	Require_once ROOT . '/app/Autoloader.php';
	app\Autoloader::register();

	 $page = 'connexion';

	 if (isset($_GET['pag'])) {
		 $page = $_GET['api'];
	 }

	 $nameController = 'app\controller\\'.ucfirst($page).'Controller';

	 if (!class_exists($nameController) || !method_exists($nameController, 'render')){
	     header('Location: '.WEBSITE_URL);
			 // header('Content-type: application/json; charset=utf-8');
	 }

	$controller = new $nameController;
 	$controller->render();

?>
