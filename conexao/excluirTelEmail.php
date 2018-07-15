<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 15/07/2018
 * Time: 00:13
 */

require_once ("Conexao.php");
require_once ("../class/ContatoDao.php");
require_once ("../class/Telefone.php");
require_once ("../class/Email.php");

session_start();

$contato = $_GET['contato'];
$idContato = $_GET['idContato'];

$contatoDao = new ContatoDao();

if($contato == 'email'){

    $idEmail = $_GET['idEmail'];

    $retorno = $contatoDao->excluirEmail($idEmail);

    if($retorno){
        $_SESSION['success'] = "Email Excluido com sucesso!";
        header("Location: ../add.php?id=".$idContato);
        die();
    }else{
        $_SESSION['danger'] = "Erro: ".$retorno;
        header("Location: ../add.php?id=".$idContato);
        die();
    }


}else{

    $idTel = $_GET['idTel'];

    $retorno = $contatoDao->excluirTel($idTel);

    if($retorno){
        $_SESSION['success'] = "Telefone Excluido com sucesso!";
        header("Location: ../add.php?id=".$idContato);
        die();
    }else{
        $_SESSION['danger'] = "Erro: ".$retorno;
        header("Location: ../add.php?id=".$idContato);
        die();
    }

}











?>