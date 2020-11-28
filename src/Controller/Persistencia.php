<?php


namespace Diego\Gerenciador\Controller;


use Diego\Gerenciador\Entity\Aluno;
use Diego\Gerenciador\Helper\MensagemDeAviso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use MensagemDeAviso;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $nome = filter_var(
            $request->getParsedBody()['nome'],
            FILTER_SANITIZE_STRING
        );

        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_SANITIZE_STRING
        );

        $curso = filter_var(
            $request->getParsedBody()['curso'],
            FILTER_SANITIZE_STRING
        );

        $aluno = new Aluno();
        $aluno->setNome($nome);
        $aluno->setEmail($email);
        $aluno->setCurso($curso);

        if (!is_null($id) && $id !== false) {
            $aluno->setId($id);
            $this->entityManager->merge($aluno);
            $this->defineMensagem('success', 'Informações do Aluno alterado com sucesso');
        } else {
            $this->entityManager->persist($aluno);
            $this->defineMensagem('success', 'Aluno adicionado com sucesso');

        }
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-alunos']);
    }
}