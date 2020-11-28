<?php require __DIR__ . '/../inicio.php';?>

        <a href="/novo-aluno" class="btn btn-primary mb2" style="margin-bottom: 20px">Novo Aluno</a>


        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Curso</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($alunos as $aluno) : ?>
                <tr>
                    <th scope="row"><?= $aluno->getId(); ?></th>
                    <td><?= $aluno->getNome(); ?></td>
                    <td><?= $aluno->getEmail(); ?></td>
                    <td><?= $aluno->getCurso(); ?></td>
                    <td><a href="alterar-aluno?id=<?= $aluno->getId();?>" class="btn btn-info btn-sm">Alterar</a>
                        <a href="excluir-aluno?id=<?= $aluno->getId();?>" class="btn btn-danger btn-sm">Excluir</a></td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>


<?php require __DIR__ . '/../fim.php';