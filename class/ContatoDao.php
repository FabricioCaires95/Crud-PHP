<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 01/07/2018
 * Time: 21:55
 */


require_once ('Contato.php');
require_once ('Email.php');
require_once ('Telefone.php');


class ContatoDao {


    public function getTel($id){

        $pdo = Conexao::getConn();

        $sql = $pdo->prepare("SELECT * FROM telefone WHERE id = {$id}");

        $sql->execute();

        return $sql->fetch();

    }

    public function getEmail( $id){

        $pdo = Conexao::getConn();

        $sql = $pdo->prepare("SELECT * FROM email WHERE ID = {$id}");

        $sql->execute();

        return $sql->fetch();

    }

    public function excluirContato($idContato){

        $pdo = Conexao::getConn();

        $query = "DELETE FROM contato WHERE id = {$idContato}";
        $queryTel = "DELETE FROM telefone WHERE fk_idContato = {$idContato}";
        $queryEmail = "DELETE FROM email WHERE = fk_idContato = {$idContato}";

        if ($pdo->query($queryTel)){
            return true;
        }else{
            return $pdo->errorInfo();
        }

    }

    public function excluirEmail($id){

        $pdo = Conexao::getConn();

        $query = "DELETE FROM email WHERE id = {$id}";

        if ($pdo->query($query)){
            return true;
        } else {
            return $pdo->errorInfo();
        }

    }


    public function excluirTel($id){

        $pdo = Conexao::getConn();

        $query = "DELETE FROM telefone WHERE id = {$id}";

        if ($pdo->query($query)){
            return true;
        } else {
            return $pdo->errorInfo();
        }
    }

    public function gravarEmail(Email $email){

        $pdo = Conexao::getConn();

        $query = "INSERT email(email,corporativo,fk_idContato) VALUES('{$email->getEmail()}','{$email->getCorporativo()}','{$email->getFkIdContato()}')";

        if ($pdo->query($query)){
            return true;

        }else{
            return $pdo->errorInfo();
        }
    }

    public function gravarTel(Telefone $telefone){

        $pdo = Conexao::getConn();

        $query = "insert telefone(telefone, tipo, fk_idcontato) values('{$telefone->getTelefone()}', '{$telefone->getTipo()}', '{$telefone->getFkIdContato()}')";

        if ($pdo->query($query)){
            return true;
        } else{
            return $pdo->errorInfo();
        }
    }

    public function getListTelEmail($idContato){

        $pdo = Conexao::getConn();

        $contato = new Contato();

        $emails = array();
        $tels = array();

        $queryContato = "select nome from contato where id = {$idContato}";

        $queryEmail = "select * from contato join email on contato.id = email.fk_idcontato  where contato.id = {$idContato}";

        $queryTel = "select * from contato join telefone on contato.id = telefone.fk_idcontato where contato.id = {$idContato}";

        $resultEmail = $pdo->query($queryEmail);
        $resultEmail->execute();

        $resultTel = $pdo->query($queryTel);

        $resultNome = $pdo->query($queryContato);


        while ($c = $resultEmail->fetch(PDO::FETCH_ASSOC)){

            $email = new Email();

            $email->setId($c['id']);
            $email->setEmail($c['email']);
            $email->setCorporativo($c['corporativo']);

            array_push($emails, $email);
        }

        while ($c = $resultTel->fetch(PDO::FETCH_ASSOC)){

            $tel = new Telefone();

            $tel->setId($c['id']);
            $tel->setTelefone($c['telefone']);
            $tel->setTipo($c['tipo']);

            array_push($tels, $tel);
        }

        $contato->setTelefones($tels);
        $contato->setEmails($emails);

        return $contato;
    }

    public function salvarContato(Contato $contato){

        $pdo = Conexao::getConn();
        $query = "INSERT INTO contato(nome) VALUES('{$contato->getNome()}')";

        if ($pdo->query($query)){
            return true;
        }else{
            return $pdo->errorInfo();
        }
    }

    public function getListaContatos(){

        $pdo = Conexao::getConn();

        $contatos = Array();

        $sql = "SELECT * FROM contato";

       $result = $pdo->prepare($sql);

        foreach ($pdo->query($sql) as $row){

            $contato = new Contato();
            $contato->setNome($row['nome']);
            $contato->setId($row['id']);

            array_push($contatos, $contato);

        }

        return $contatos;
    }






}

















?>