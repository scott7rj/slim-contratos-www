<?php
namespace app\controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\dao\EmailDAO;
use app\model\Email;
use app\controller\AppController;
use Exception;

final class EmailController extends AppController {
    public function __construct() {
        parent::__construct();
    }
    public function insertEmail(Request $request, Response $response, array $args): Response {
        try {
            $data = $request->getParsedBody();
            $dao = new EmailDAO();
            $model = new Email();
            $model->setIdEmpresa($data['idEmpresa']);
            $model->setIdTipoContato($data['idTipoContato']);
            $model->setEmail($data['email']);
            $model->setUsuarioAlteracao($data['usuarioAlteracao']);
            $result = $dao->insertEmail($model);
            return $result;
        } catch (Exception $e) {
            $response = $response->withJson($this->getErroJson($e->getMessage()));
            return $response;
        }
    }
    public function updateEmail(Request $request, Response $response, array $args): Response {
        try {
            $data = $request->getParsedBody();
            $dao = new EmailDAO();
            $model = new Email();
            $model->setIdEmail($data['idEmail']);
            $model->setIdEmpresa($data['idEmpresa']);
            $model->setIdTipoContato($data['idTipoContato']);
            $model->setEmail($data['email']);
            $model->setUsuarioAlteracao($data['usuarioAlteracao']);
            $result = $dao->updateEmail($model);
            return $result;
        } catch (Exception $e) {
            $response = $response->withJson($this->getErroJson($e->getMessage()));
            return $response;
        }
    }
    public function deleteEmail(Request $request, Response $response, array $args): Response {
        try {
            $data = $request->getParsedBody();
            $dao = new EmailDAO();
            $model = new Email();
            $model->setIdEmail($data['idEmail']);
            $result = $dao->deleteEmail($model);
            return $result;
        } catch (Exception $e) {
            $response = $response->withJson($this->getErroJson($e->getMessage()));
            return $response;
        }
    }
}