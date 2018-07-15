<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 01/07/2018
 * Time: 21:50
 */

class Email
{
    private $id;
    private $email;
    private $corporativo;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCorporativo()
    {
        return $this->corporativo;
    }

    /**
     * @param mixed $corporativo
     */
    public function setCorporativo($corporativo)
    {
        $this->corporativo = $corporativo;
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