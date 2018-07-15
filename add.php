<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 15/07/2018
 * Time: 00:21
 */



require_once("conexao/Conexao.php");
require_once("class/ContatoDao.php");
require_once ("class/Contato.php");
session_start();
$contatoDao = new ContatoDao();

$idContato = $_GET['id'];

$contatos = $contatoDao->getListTelEmail($idContato);


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
        <h2 class="font-weight-normal"><?php echo $contatos->getNome(); ?></h2>
<?php if(isset($_SESSION['success'])){
    $msg = $_SESSION["success"];
    echo '<div class="alert alert-success" role="alert">'.$msg.'</div>';
    session_destroy();
}else if(isset($_SESSION['danger'])){
    $msg = $_SESSION["danger"];
    echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
    session_destroy();
} ?>
</div>
<hr>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" href="index.php" aria-selected="true">Voltar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" id="tabTel" data-toggle="tab" href="#navTel" role="tab"  aria-selected="true" style="color: #1b1e21;">Telefone</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tabEmail" data-toggle="tab" href="#navEmail" role="tab" aria-selected="false" style="color: #1b1e21;">Email</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="navTel" role="tabpanel" aria-labelledby="tabTel">

        <form action="conexao/incluirTelEmail.php" method="post" style="padding: 15px;">
            <input type="hidden" name="idContato" value="<?php echo $idContato; ?>">
            <input type="hidden" name="contato" value="telefone">
            <h4>Adicionar Telefone</h4>
            <div class="form-row">
                <div class="form-group col-7">
                    <input class="form-control" type="text" name="tel" placeholder="Telefone">
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


        </form>

    </div>
    <div class="tab-pane" id="navEmail" role="tabpanel" aria-labelledby="tabEmail">
        <form action="conexao/incluirTelEmail.php" method="post" style="padding: 15px;">
            <input type="hidden" name="idContato" value="<?php echo $idContato; ?>">
            <input type="hidden" name="contato" value="email">
            <h4>Adicionar Email</h4>
            <div class="form-row">
                <div class="form-group col-7">
                    <input class="form-control" type="text" name="email" placeholder="Email">
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
        </form>
    </div>
</div>

<div style="margin-top: 30px;">
    <h3>Emails</h3>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th width="30%">Contato</th>
            <th width="30%">Obs</th>
            <th width="40%" colspan="2" class="text-center">Opções</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contatos->getEmails() as $c) {?>
        <tr>
            <td><?php $c->getEmail(); ?> </td>
            <td><?php ($c->getCorporativo() == '1') ? "Email Corporativo": "Email Pessoal"; ?></td>
            <td><a href="editarTelEmail.php?update=email&id=<?php echo $c->getId(); ?>" class="btn btn-outline-secondary">Editar Contato</a></td>
            <td><a href="conexao/excluirTelEmail.php?contato=email&idEmail=<?php echo $c->getId(); ?>&idContato=<?php echo $idContato; ?>" class="btn btn-outline-danger">Excluir Contato</a></td>

        </tr>

        <?php }?>
        </tbody>
    </table>

    <h3>Telefones</h3>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th width="30%">Contato</th>
            <th width="30%">Obs</th>
            <th width="40%" colspan="2" class="text-center">Opções</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contatos->getTelefones() as $c){?>
            <tr>
                <td> <?php echo $c->getTelefone(); ?> </td>
                <td><?php echo $c->getTipo(); ?> </td>
                <td><a href="editarTelEmail.php?update=tel&id=<?php echo $c->getId(); ?>" class="btn btn-outline-secondary">Editar Contato</a></td>
                <td><a href="conexao/excluirTelEmail.php?contato=telefone&idTel=<?php echo $c->getId(); ?>&idContato=<?php echo $idContato; ?>" class="btn btn-outline-danger">Excluir Contato</a></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>

</div>



<script src="assets/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>

</body>



</html>



?>