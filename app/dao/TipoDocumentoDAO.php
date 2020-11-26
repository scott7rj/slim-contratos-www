<?php
namespace app\dao;
use app\model\TipoDocumento;
use Exception;

class TipoDocumentoDAO extends Conexao {
    public function __construct() {
        parent::__construct();
    }
    public function selectTipoDocumento() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM [contratos].[fn_tipo_documento_selecionar](:ativo)");
            $ativo = 1;
            $stmt->bindParam('ativo', $ativo);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function selectTipoDocumentoPorIdDominio($idDominioDocumento) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM [contratos].[fn_tipo_documento_selecionar_por_id_dominio_documento](:id_dominio_documento)");
            $stmt->bindParam('id_dominio_documento', $idDominioDocumento);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
	public function insertTipoDocumento(TipoDocumento $model) {
        try {
            $stmt = $this->pdo->prepare("EXEC [contratos].[tipo_documento_inserir] 
                                        @tipo_documento = '{$model->getTipoDocumento()}', 
                                        @possui_validade = '{$model->getPossuiValidade()}', 
                                        @id_dominio_documento = '{$model->getIdDominioocumento()}', 
                                        @usuario_alteracao = '{$model->getUsuarioAlteracao()}'");
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_COLUMN);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function updateTipoDocumento(TipoDocumento $model) {
        try {
        $stmt = $this->pdo->prepare("EXEC [contratos].[tipo_documento_alterar] 
                                        @id_tipo_documento = '{$model->getIdTipoDocumento()}', 
                                        @tipo_documento = '{$model->getTipoDocumento()}', 
                                        @possui_validade = '{$model->getPossuiValidade()}', 
                                        @id_dominio_documento = '{$model->getIdDominioocumento()}', 
                                        @usuario_alteracao = '{$model->getUsuarioAlteracao()}'");
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_COLUMN);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function deleteTipoDocumento(TipoDocumento $model) {
        try {
            $stmt = $this->pdo->prepare("EXEC [contratos].[tipo_documento_remover] 
                                        @id_tipo_documento = '{$model->getIdTipoDocumento()}'");
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_COLUMN);
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}