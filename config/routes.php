<?php

$rotas = [
    '/login' => \Diego\Gerenciador\Controller\FormularioLogin::class,
    '/realizar-login' => \Diego\Gerenciador\Controller\RealizarLogin::class,
    '/listar-alunos' => \Diego\Gerenciador\Controller\ListarAlunos::class
];

return $rotas;