<?php

$rotas = [
    '/login' => \Diego\Gerenciador\Controller\FormularioLogin::class,
    '/logout' => \Diego\Gerenciador\Controller\Deslogar::class,
    '/realizar-login' => \Diego\Gerenciador\Controller\RealizarLogin::class,
    '/listar-alunos' => \Diego\Gerenciador\Controller\ListarAlunos::class,
    '/excluir-aluno' => \Diego\Gerenciador\Controller\ExclusaoAluno::class,
    '/alterar-aluno' => \Diego\Gerenciador\Controller\FormularioEdicao::class,
    '/novo-aluno' => \Diego\Gerenciador\Controller\FormularioInsercao::class,
    '/salvar-aluno' => \Diego\Gerenciador\Controller\Persistencia::class
];

return $rotas;