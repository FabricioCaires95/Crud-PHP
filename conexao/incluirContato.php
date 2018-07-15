<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 15/07/2018
 * Time: 00:13
 */

require_once("Conexao.php");
require_once("../class/Contato.php");
require_once("../class/Email.php");
require_once("../class/Telefone.php");
require_once("../class/ContatoDao.php");
session_start();


$contato = new Contato();
$contato->setNome($_POST['nome']);

$contatoDao = new ContatoDao();

$retorno = $contatoDao->salvarContato($contato);

if ($retorno){
    $_SESSION['success'] = "Contato Adicionado com sucesso!";
    header("Location: ../index.php");
    die();
}else{
    $_SESSION['danger'] = "Erro: ".$retorno;
    header("Location: ../index.php");
    die();
}







?>