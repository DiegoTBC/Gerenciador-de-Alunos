<?php require __DIR__ . '/../inicio.php';?>

    <div class="container d-flex justify-content-center">
        <form action="/salvar-aluno<?= isset($aluno) ? '?id=' . $aluno->getId() : '';?>" method="post"  class="needs-validation" novalidate style="width: 50%;">
            <div class="form-group">
                <label for="nome"><b>Nome</b></label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($aluno) ? $aluno->getNome() : ""; ?>" required>
            </div>
            <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($aluno) ? $aluno->getEmail(): ""; ?>" required>
            </div>
            <div class="form-group">
                <label for="curso"><b>Curso</b></label>
                <input type="text" class="form-control" id="curso" name="curso" value="<?= isset($aluno) ? $aluno->getCurso() : ""; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Finalizar</button>
            <a href="/listar-alunos" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

<?php require __DIR__ . '/../valida-formulario.php';
require __DIR__ . '/../fim.php';