<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 15/07/2018
 * Time: 00:13
 */

require_once("Conexao.php");
require_once("../class/ContatoDao.php");
require_once("../class/Telefone.php");
require_once("../class/Email.php");
session_start();

$contato = $_POST['contato'];
$idContato = $_POST['idContato'];

$contatoDao = new ContatoDao();

if($contato == 'email'){
    $email = new Email();
    $email->setEmail($_POST['email']);

    if(isset($_POST['corporativo'])){
        $email->setCorporativo('1');
    }else{
        $email->setCorporativo('0');
    }

    $email->setFkIdContato($idContato);

    $retorno = $contatoDao->gravarEmail($email);

    if($retorno){
        $_SESSION['success'] = "Email Adicionado com sucesso!";
        header("Location: ../add.php?id=".$idContato);
        die();
    }else{
        $_SESSION['danger'] = "Erro: ".$retorno;
        header("Location: ../add.php?id=".$idContato);
        die();
    }


}else{

    $telefone = new Telefone();

    $telefone->setTelefone($_POST['tel']);
    $telefone->setTipo($_POST['tipo']);
    $telefone->setFkIdContato($idContato);

    $retorno = $contatoDao->gravarTel($telefone);

    if($retorno){
        $_SESSION['success'] = "Telefone Adicionado com sucesso!";
        header("Location: ../add.php?id=".$idContato);
        die();
    }else{
        $_SESSION['danger'] = "Erro: ".$retorno;
        header("Location: ../add.php?id=".$idContato);
        die();
    }

}

?>