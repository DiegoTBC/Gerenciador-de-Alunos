<?php


namespace Diego\Gerenciador\Controller;


use Diego\Gerenciador\Entity\Usuario;
use Diego\Gerenciador\Helper\MensagemDeAviso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use MensagemDeAviso;

    private $repositorioUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_SANITIZE_STRING
        );

        if (is_null($email) || $email === false) {
            $this->defineMensagem('danger', 'Email inválido');
            return new Response(302, ['Location' => '/login']);
        }

        $senha = filter_var(
            $request->getParsedBody()['senha'],
            FILTER_SANITIZE_STRING
        );

        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuarios->findOneBy(['email' === $email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger', 'Email ou senha inválido');
            return new Response(302, ['Location' => '/login']);
        }

        $_SESSION['logado'] = true;

        return new Response(302, ['Location' => '/listar-alunos']);

    }
}