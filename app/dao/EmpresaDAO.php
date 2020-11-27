<?php
namespace app\dao;
use app\model\Empresa;
use app\dao\DbUtil;

class EmpresaDAO extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    public function selectEmpresa() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM [contratos].[fn_empresa_selecionar](:ativo)");
            $ativo = 1;
            $stmt->bindParam('ativo', $ativo);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function selectEmpresaPorId(Empresa $model) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM [contratos].[fn_empresa_selecionar_por_id](:id_empresa)");
            $idEmpresa = $model->getIdEmpresa();
            $stmt->bindParam('id_empresa', $idEmpresa);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function selectEmpresaTelefone($idEmpresa) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM [contratos].[fn_telefone_selecionar_por_id_empresa](:id_empresa) ORDER BY tipo_contato");
            $stmt->bindParam('id_empresa', $idEmpresa);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function selectEmpresaEmail($idEmpresa) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM [contratos].[fn_Email_selecionar_por_id_empresa](:id_empresa) ORDER BY tipo_contato");
            $stmt->bindParam('id_empresa', $idEmpresa);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function selectEmpresaDocumento($idEmpresa) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM [contratos].[fn_Documento_selecionar_por_id_empresa](:id_empresa) ORDER BY tipo_documento");
            $stmt->bindParam('id_empresa', $idEmpresa);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insertEmpresa(Empresa $model) {
        try {
            $stmt = $this->pdo->prepare("EXEC [contratos].[empresa_inserir] 
                                        @empresa = '{$model->getEmpresa()}', 
                                        @cnpj = '{$model->getCnpj()}',
                                        @endereco= '{$model->getEndereco()}',
                                        @cidade= '{$model->getCidade()}',
                                        @uf= '{$model->getUf()}',
                                        @cep= '{$model->getCep()}',
                                        @observacao= '{$model->getObservacao()}',
                                        @ativo= '{$model->getAtivo()}',
                                        @usuario_alteracao = '{$model->getUsuarioAlteracao()}'");
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_COLUMN);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function updateEmpresa(Empresa $model) {
        try {
            $stmt = $this->pdo->prepare("EXEC [contratos].[empresa_alterar] 
                                        @id_empresa = '{$model->getIdEmpresa()}', 
                                        @empresa = '{$model->getEmpresa()}', 
                                        @cnpj = '{$model->getCnpj()}',
                                        @endereco= '{$model->getEndereco()}',
                                        @cidade= '{$model->getCidade()}',
                                        @uf= '{$model->getUf()}',
                                        @cep= '{$model->getCep()}',
                                        @observacao= '{$model->getObservacao()}',
                                        @ativo= '{$model->getAtivo()}',
                                        @usuario_alteracao = '{$model->getUsuarioAlteracao()}'");
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_COLUMN);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function deleteEmpresa(Empresa $model) {
        try {
            $stmt = $this->pdo->prepare("EXEC [contratos].[empresa_remover] 
                                        @id_empresa = '{$model->getIdEmpresa()}'");
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_COLUMN);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}