<?php
namespace app\controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\dao\EmpresaDAO;
use app\model\Empresa;
use app\controller\AppController;
use Exception;

final class EmpresaController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    public function selectEmpresa(Request $request, Response $response, array $args) {
        try {
            $dao = new EmpresaDAO();
            $result = $dao->selectEmpresa();
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function selectEmpresaPorId(Request $request, Response $response, array $args) {
        try {
            $data = $request->getQueryParams();
            $dao = new EmpresaDAO();
            $model = new Empresa();
            $model->setIdEmpresa($data['idEmpresa']);
            $result = $dao->selectEmpresaPorId($model);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function selectEmpresaTelefone(Request $request, Response $response, array $args) {
        try {
            $data = $request->getQueryParams();
            $idEmpresa = $data['idEmpresa'];
            $dao = new EmpresaDAO();
            $result = $dao->selectEmpresaTelefone($idEmpresa);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function selectEmpresaEmail(Request $request, Response $response, array $args) {
        try {
            $data = $request->getQueryParams();
            $idEmpresa = $data['idEmpresa'];
            $dao = new EmpresaDAO();
            $result = $dao->selectEmpresaEmail($idEmpresa);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function selectEmpresaDocumento(Request $request, Response $response, array $args) {
        try {
            $data = $request->getQueryParams();
            $idEmpresa = $data['idEmpresa'];
            $dao = new EmpresaDAO();
            $result = $dao->selectEmpresaDocumento($idEmpresa);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insertEmpresa(Request $request, Response $response, array $args) {
        try {
            $data = $request->getParsedBody();
            $dao = new EmpresaDAO();
            $model = new Empresa();
            $model->setEmpresa($data['empresa']);
            $model->setCnpj($data['cnpj']);
            $model->setEndereco($data['endereco']);
            $model->setCidade($data['cidade']);
            $model->setUf($data['uf']);
            $model->setCep($data['cep']);
            $model->setObservacao($data['observacao']);
            $model->setAtivo($data['ativo']);
            $model->setUsuarioAlteracao($data['usuarioAlteracao']);
            $result = $dao->insertEmpresa($model);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function updateEmpresa(Request $request, Response $response, array $args) {
        try {
            $data = $request->getParsedBody();
            $dao = new EmpresaDAO();
            $model = new Empresa();
            $model->setIdEmpresa($data['idEmpresa']);
            $model->setEmpresa($data['empresa']);
            $model->setCnpj($data['cnpj']);
            $model->setEndereco($data['endereco']);
            $model->setCidade($data['cidade']);
            $model->setUf($data['uf']);
            $model->setCep($data['cep']);
            $model->setObservacao($data['observacao']);
            $model->setAtivo($data['ativo']);
            $model->setUsuarioAlteracao($data['usuarioAlteracao']);
            $result = $dao->updateEmpresa($model);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function deleteEmpresa(Request $request, Response $response, array $args) {
        try {
            $data = $request->getParsedBody();
            $dao = new EmpresaDAO();
            $model = new Empresa();
            $model->setIdEmpresa($data['idEmpresa']);
            $result = $dao->deleteEmpresa($model);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}