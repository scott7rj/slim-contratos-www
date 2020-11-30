<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\controller\ContratoController;
use app\util\ComboBuilder;

$app->get('/listarEmpresaContrato', function(Request $request, Response $response) {
	try {
		$comboEmpresa = ComboBuilder::comboEmpresa("listaContratoSelEmpresa", "", "", true, "250px");
		return $this->view->render($response, 'contrato/contratoEmpresa.twig', ['listaContratoSelEmpresa' => $comboEmpresa]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/listarContrato', function(Request $request, Response $response) {
	try {
		$data = $request->getQueryParams();
		$idEmpresa = $data['idEmpresa'];

		$controller = new ContratoController();
		$array = $controller->selectContratoPorIdEmpresa($request, $response, array());
		return $this->view->render($response, 'contrato/contratos.twig', ['contratos' => $array]);

	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/carregarContrato', function(Request $request, Response $response) {
	try {
		$data = $request->getQueryParams();
		$idContrato = $data['idContrato'];
		$controller = new ContratoController();

		if ($idContrato === "0") {
			$array = array();
			$comboEmpresa = ComboBuilder::comboEmpresa("contratoSelEmpresa", "", "", false, "250px");
		} else {
			$array = $controller->selectContratoPorId($request, $response, array());

			$comboEmpresa = ComboBuilder::comboEmpresa("contratoSelEmpresa", "", $array['id_empresa'], false, "250px");
		}
		return $this->view->render($response, 'contrato/contrato.twig', ['contrato' => $array, 'contratoSelEmpresa' => $comboEmpresa]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/carregarItemSubitemContrato', function(Request $request, Response $response) {
	try {
		$data = $request->getQueryParams();
		$idContrato = $data['idContrato'];
		$controller = new ContratoController();
		//$array = $controller->selectContratoPorIdEmpresa($request, $response, array());
		return $this->view->render($response, 'contrato/contratoItemSubitem.twig', []);

	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

