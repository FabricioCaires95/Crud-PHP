<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 15/07/2018
 * Time: 05:06
 */


require_once("conexao/Conexao.php");
require_once("class/ContatoDao.php");

$contatoDao = new ContatoDao();

$id = $_GET['id'];
$tipoUpdate = $_GET['update'];



if($tipoUpdate == 'tel'){
    $telefone = $contatoDao->getTel($id);
}else{
    $email = $contatoDao->getEmail($id);
}
?>

<!doctype html>
<html>
<head>
    <title>Agenda</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <style>
        body{
            background-color: rgb(234, 234, 234);
        }
    </style>

</head>
<body>
<div class="container">
    <div class="text-center" style="padding-top: 30px;">
        <h2 class="font-weight-normal"></h2>
    </div>
    <hr>
    <?php if($tipoUpdate != 'tel'){
        echo '<form action="conexao/incluirTelEmail.php" method="post" style="padding: 15px;">
        <input type="hidden" name="id" value="'.$id.'">
        <h4>Adicionar Email</h4>
        <div class="form-row">
            <div class="form-group col-7">
                <input class="form-control" type="text" name="email" placeholder="Email" value="'.$telefone[1].'">
            </div>

            <div class="form-group col-5">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="corporativo">
                    <label class="form-check-label" for="inlineCheckbox1">Email Corporativo</label>
                </div>
            </div>
            <div class="form-group col-12 text-center">
                <button class="btn btn-primary"> Salvar</button>
            </div>
        </div>
    </form>';
    }else{
        echo '<form action="conexao/incluirTelEmail.php" method="post" style="padding: 15px;">
        <input type="hidden" name="id" value="'.$id.'">
        <h4>Adicionar Telefone</h4>
        <div class="form-row">
            <div class="form-group col-7">
                <input class="form-control" type="text" name="tel" placeholder="Telefone" value="'.$email[1].'">
            </div>

            <div class="form-group col-5">
                <select class="form-control" name="tipo">
                    <option selected disabled>Escolha um tipo</option>
                    <option value="residencial">residencial</option>
                    <option value="celular">celular</option>
                    <option value="trabalho">trabalho</option>
                </select>
            </div>
            <div class="form-group col-12 text-center">
                <button class="btn btn-primary"> Salvar</button>
            </div>
        </div>


    </form>';
    }?>


</div>

<script src="assets/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>

</body>



</html>

