<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php if($_SERVER['PATH_INFO'] !== '/login' && isset($_SESSION['logado'])):?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <form class="d-flex">
            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php endif; ?>

<div class="container">

<?php if (isset($_SESSION['tipoMensagem']) && isset($_SESSION['mensagem']) ):?>
    <div class="alert alert-<?= $_SESSION['tipoMensagem'];?>">
        <?= $_SESSION['mensagem']; ?>
    </div>
    <?php
    unset($_SESSION['tipoMensagem']);
    unset($_SESSION['mensagem']);
endif;
?>
