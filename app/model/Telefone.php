<?php
namespace app\model;
use app\model\AppModel;

final class Telefone extends AppModel {
    private $idTelefone;
    private $idEmpresa;
    private $idTipoContato;
    private $tipoContato;
    private $telefone;

    public function __construct() {
        parent::__construct();
    }
    
    /**
     * @return mixed
     */
    public function getIdTelefone()
    {
        return $this->idTelefone;
    }

    /**
     * @param mixed $idTelefone
     *
     * @return self
     */
    public function setIdTelefone($idTelefone)
    {
        $this->idTelefone = $idTelefone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    /**
     * @param mixed $idEmpresa
     *
     * @return self
     */
    public function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
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

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     *
     * @return self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
}



