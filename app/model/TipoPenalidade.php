<?php
namespace app\model;
use app\model\AppModel;

final class TipoPenalidade extends AppModel {
    private $idTipoPenalidade;
    private $tipoPenalidade;
    
    public function __construct() {
        parent::__construct();
    }
    /**
     * @return mixed
     */
    public function getIdTipoPenalidade()
    {
        return $this->idTipoPenalidade;
    }

    /**
     * @param mixed $idTipoPenalidade
     *
     * @return self
     */
    public function setIdTipoPenalidade($idTipoPenalidade)
    {
        $this->idTipoPenalidade = $idTipoPenalidade;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoPenalidade()
    {
        return $this->tipoPenalidade;
    }

    /**
     * @param mixed $tipoPenalidade
     *
     * @return self
     */
    public function setTipoPenalidade($tipoPenalidade)
    {
        $this->tipoPenalidade = $tipoPenalidade;

        return $this;
    }
}