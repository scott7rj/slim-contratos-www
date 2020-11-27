<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\controller\EmpresaController;
use app\util\ComboBuilder;

$app->get('/listarEmpresa', function(Request $request, Response $response) {
	try {
		$controller = new EmpresaController();
		$array = $controller->selectEmpresa($request, $response, array());
		return $this->view->render($response, 'empresa/empresas.twig', ['empresas' => $array]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/carregarEmpresa', function(Request $request, Response $response) {
	try {
		$data = $request->getQueryParams();
		$idEmpresa = $data['idEmpresa'];
		$controller = new EmpresaController();
		if ($idEmpresa === "0") {
			$array = array();
			$comboUf = ComboBuilder::comboUf("empresaSelUf", "", "", false, "60px");
		} else {
			$array = $controller->selectEmpresaPorId($request, $response, array());
			$comboUf = ComboBuilder::comboUf("empresaSelUf", "", $array['uf'], false, "60px");
		}
		return $this->view->render($response, 'empresa/empresa.twig', ['empresa' => $array, 'empresaSelUf' => $comboUf]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/carregarTelefoneEmpresa', function(Request $request, Response $response) {
	try {
		$data = $request->getQueryParams();
		$idEmpresa = $data['idEmpresa'];
		$controller = new EmpresaController();
		
		if ($idEmpresa === "0")
			$array = array();
		else 
			$array = $controller->selectEmpresaTelefone($request, $response, array());

		$comboTipoContato = ComboBuilder::comboTipoContato("empresaSelTelefoneTipoContato", "", "", false, "150px");
			
		return $this->view->render($response, 'empresa/empresaTelefone.twig', ['telefones' => $array, 'empresaSelTelefoneTipoContato' => $comboTipoContato, 'idEmpresa' => $idEmpresa]);

	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/carregarEmailEmpresa', function(Request $request, Response $response) {
	try {
		$data = $request->getQueryParams();
		$idEmpresa = $data['idEmpresa'];
		$controller = new EmpresaController();

		if ($idEmpresa === "0") 
			$array = array();
		else
			$array = $controller->selectEmpresaEmail($request, $response, array());

		$comboTipoContato = ComboBuilder::comboTipoContato("empresaSelEmailTipoContato", "", "", false, "150px");
		
		return $this->view->render($response, 'empresa/empresaEmail.twig', ['emails' => $array, 'empresaSelEmailTipoContato' => $comboTipoContato, 'idEmpresa' => $idEmpresa]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

$app->get('/carregarDocumentoEmpresa', function(Request $request, Response $response) {
	try {
		$data = $request->getQueryParams();
		$idEmpresa = $data['idEmpresa'];
		$controller = new EmpresaController();
		if ($idEmpresa === "0") 
			$array = array();
		else
			$array = $controller->selectEmpresaDocumento($request, $response, array());
		
		//var_dump($array); die;	
		$comboTipoDocumento = ComboBuilder::comboTipoDocumentoPorIdDominio(1, "empresaSelDocumentoTipoDocumento", "", "", false, "350px");
		
		return $this->view->render($response, 'empresa/empresaDocumento.twig', ['documentos' => $array, 'empresaSelDocumentoTipoDocumento' => $comboTipoDocumento, 'idEmpresa' => $idEmpresa]);
	} catch (Exception $e) {
		throw new Exception($e->getMessage());
	}
});

