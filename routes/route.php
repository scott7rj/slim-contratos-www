<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\controller\LoginController;

$app->get('/', function(Request $request, Response $response) {
	return $this->view->render($response, 'portal.twig');
});

$app->get('/menu', function(Request $request, Response $response) {
	try {
		$strJsonFileContents = file_get_contents("json/menu.json");
		$array = json_decode($strJsonFileContents, true);
		return $this->view->render($response, 'menu/menu.twig', ['menu' => $array]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->post('/login', function(Request $request, Response $response) {
	try {
		$controller = new LoginController();
		$array = $controller->autenticar($request, $response, array());
		return json_encode($array);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});




