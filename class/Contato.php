<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 01/07/2018
 * Time: 21:46
 */

class Contato
{

    private $id;
    private $nome;
    private $email;
    private $telefone;

    private $telefones = array();
    private $emails = array();

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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
     * @return array
     */
    public function getTelefones()
    {
        return $this->telefones;
    }

    /**
     * @param array $telefones
     */
    public function setTelefones($telefones)
    {
        $this->telefones = $telefones;
    }

    /**
     * @return array
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param array $emails
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
    }






}



?>