<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 14/07/2018
 * Time: 23:26
 */

require_once ("Conexao.php");
require_once ("../class/ContatoDao.php");
session_start();

$idContato = $_GET['idContato'];

$contatoDao = new ContatoDao();

$retorno = $contatoDao->excluirContato($idContato);

if ($retorno){
    $_SESSION['success'] = "Contato Excluído com sucesso!";
    header("Location: ../index.php");
    die();
} else {
    $_SESSION['danger'] = "Erro: ". $retorno;
    header("Location: ../index.php");
    die();
}








?>