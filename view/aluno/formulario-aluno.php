<?php require __DIR__ . '/../inicio.php';?>

    <div class="container">
        <form action="/salvar-aluno<?= isset($aluno) ? '?id=' . $aluno->getId() : '';?>" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= isset($aluno) ? $aluno->getNome() : ""; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($aluno) ? $aluno->getEmail(): ""; ?>">
            </div>
            <div class="form-group">
                <label for="curso">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" value="<?= isset($aluno) ? $aluno->getCurso() : ""; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Finalizar</button>
            <a href="/listar-alunos" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>



<?php require __DIR__ . '/../fim.php';