<?php require __DIR__ . '/../inicio.php';?>

    <div class="container d-flex justify-content-center">
        <form action="/realizar-login" method="post" class="needs-validation" novalidate style="width: 30%">
            <div class="form-group mb-3 ">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>

            <button class="btn btn-primary">Entrar</button>
        </form>
    </div>

<?php require __DIR__ . '/../valida-formulario.php';
require __DIR__ . '/../fim.php';

