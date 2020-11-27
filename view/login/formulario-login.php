<?php require __DIR__ . '/../inicio.php';?>

    <div class="jumbotron">
        <h1><?= $titulo; ?></h1>
    </div>

        <form action="/realizar-login" method="post">
            <div class="form-group mb-3 ">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control">
            </div>

            <button class="btn btn-primary">Entrar</button>
        </form>

<?php require __DIR__ . '/../fim.php';

