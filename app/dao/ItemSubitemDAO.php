<?php
namespace app\dao;
use app\model\Item;
use app\model\Subitem;

class ItemSubitemDAO extends Conexao {
    
    public function __construct() {
        parent::__construct();
    }

    public function selectTree($idContrato) {
        $sql = "
            SELECT a.id_item, a.item, a.id_contrato, b.id_subitem, B.subitem, b.qtd, b.valor_unitario 
            FROM contratos.tb_itens a 
            LEFT JOIN contratos.tb_subitens b ON a.id_item = b.id_item
            WHERE A.id_contrato = :id_contrato
            AND b.subitem IS NOT NULL
            ORDER BY a.item, b.subitem";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":id_contrato"=>$idContrato]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}