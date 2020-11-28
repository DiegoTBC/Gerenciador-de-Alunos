<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php if($_SERVER['PATH_INFO'] !== '/login' && isset($_SESSION['logado'])):?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd; margin-bottom: 30px">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">GerenciaAlunos</span>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a href="/logout" class="btn btn-outline-danger">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<?php endif; ?>

<div class="container">

    <?php if($_SERVER['PATH_INFO'] === '/login'):?>
        <div class="jumbotron">
            <h1 style="text-align: center"><?= $titulo; ?></h1>
        </div>
    <?php endif; ?>

<?php if (isset($_SESSION['tipoMensagem']) && isset($_SESSION['mensagem']) ):?>
    <div class="alert alert-<?= $_SESSION['tipoMensagem'];?>" style="margin-bottom: 20px">
        <?= $_SESSION['mensagem']; ?>
    </div>
    <?php
    unset($_SESSION['tipoMensagem']);
    unset($_SESSION['mensagem']);
endif;
?>
