<?php
/**
 * Created by PhpStorm.
 * User: fabri
 * Date: 01/07/2018
 * Time: 06:18
 */

require_once ("conexao/Conexao.php");
require_once ("class/ContatoDao.php");

session_start();

$contatoDao = new ContatoDao();

$conexao = Conexao::getConn();

$contatos = $contatoDao->getListaContatos();


?>

<!doctype html>
<html>
<head>
    <title>Agenda </title>
    <meta charset="UTF-8">
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
            <h2 class="font-weight-normal">Agenda de Contatos</h2>
           <?php if (isset($_SESSION['success'])){
               $mensagem = $_SESSION['success'];
               echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
                session_destroy();
           }else if(isset($_SESSION['danger'])){
               $msg = $_SESSION["danger"];
               echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
               session_destroy();
           } ?>

        </div>
        <hr>
        <div class="card" style="background-color: rgb(255,255,220);">
            <h5 class="card-header">Criar novo contato</h5>
            <div class="card-body">
                <form class="form-row" action="conexao/incluirContato.php" method="post">
                    <div class="form-group col-10">
                        <input type="text" name="nome" class="form-control" placeholder="Insira o nome completo">
                    </div>

                    <div class="form-group col-2">
                        <button class="btn btn-info">Criar</button>
                    </div>

                </form>
            </div>
        </div>


        <div style="margin-top: 30px;">
            <h3>Contatos</h3>
            <table class="table">
                <thead>
                <tr>
                    <th width="50%">Nome</th>
                    <th colspan="3" class="text-center">Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($contatos as $c){?>
                    <tr>
                        <td><?php echo $c->getNome(); ?> </td>
                        <td><a href="add.php?id=<?php echo $c->getId(); ?>" class="btn btn-outline-secondary">Visualizar contatos</a></td>
                        <td><a href="#" class="btn btn-outline-success">Editar Contato</a></td>
                        <td><a href="conexao/excluirContato.php?idContato=<?php echo $c->getId(); ?>" class="btn btn-outline-danger">Excluir Contato</a></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

        </div>




    </div>


<script src="assets/bootstrap/js/bootstrap.js"></script>
</body>


</html>





