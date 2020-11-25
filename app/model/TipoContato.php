<?php
namespace app\model;
use app\model\AppModel;

final class TipoContato extends AppModel {
    private $idTipoContato;
    private $tipoContato;

    
    public function __construct() {
        parent::__construct();
    }
    /**
     * @return mixed
     */
    public function getIdTipoContato()
    {
        return $this->idTipoContato;
    }

    /**
     * @param mixed $idTipoContato
     *
     * @return self
     */
    public function setIdTipoContato($idTipoContato)
    {
        $this->idTipoContato = $idTipoContato;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoContato()
    {
        return $this->tipoContato;
    }

    /**
     * @param mixed $tipoContato
     *
     * @return self
     */
    public function setTipoContato($tipoContato)
    {
        $this->tipoContato = $tipoContato;

        return $this;
    }

}