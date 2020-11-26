<?php
namespace app\controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use app\dao\UfDAO;
use app\model\Uf;
use app\controller\AppController;
use Exception;

final class UfController extends AppController {
    public function __construct() {
        parent::__construct();
    }
    public function selectUf(Request $request, Response $response, array $args) {
        try {
            $dao = new UfDAO();
            $result = $dao->selectUf();
            return $result;
        } catch (Exception $e) {
            $response = $response->withJson($this->getErroJson($e->getMessage()));
            return $response;
        }
    }
}