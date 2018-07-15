<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 01/07/2018
 * Time: 21:52
 */

class Telefone
{
    private $id;
    private $telefone;
    private $tipo;
    private $fk_idContato;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getFkIdContato()
    {
        return $this->fk_idContato;
    }

    /**
     * @param mixed $fk_idContato
     */
    public function setFkIdContato($fk_idContato)
    {
        $this->fk_idContato = $fk_idContato;
    }



}


?>