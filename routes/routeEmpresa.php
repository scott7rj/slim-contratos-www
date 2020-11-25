<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\controller\EmpresaController;

$app->get('/empresas', function(Request $request, Response $response) {
	try {
		$controller = new EmpresaController();
		$array = $controller->selectEmpresa($request, $response, array());
		return $this->view->render($response, 'empresa/empresas.twig', ['array' => $array]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/loadEmpresa', function(Request $request, Response $response) {
	try {		
		$controller = new EmpresaController();
		$array = $controller->selectEmpresaPorId($request, $response, array());
		//var_dump($array); die;
		return $this->view->render($response, 'empresa/empresa.twig', ['array' => $array]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});