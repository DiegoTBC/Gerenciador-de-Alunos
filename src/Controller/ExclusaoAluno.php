<?php


namespace Diego\Gerenciador\Controller;


use Diego\Gerenciador\Entity\Aluno;
use Diego\Gerenciador\Helper\MensagemDeAviso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExclusaoAluno implements RequestHandlerInterface
{
    use MensagemDeAviso;

    private \Doctrine\Persistence\ObjectRepository $repositorioAlunos;
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioAlunos = $this->entityManager->getRepository(Aluno::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $resposta = new Response(302, ['Location' => '/listar-alunos']);

        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Aluno não encontrado.');
            return $resposta;
        }

        $aluno = $this->entityManager->getReference(Aluno::class, $id);

        /*if (is_null($aluno)) {
            $this->defineMensagem('danger', 'Aluno não encontrado.');
            return $resposta;
        }*/

        $this->entityManager->remove($aluno);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Aluno excluido com sucesso.');

        return $resposta;
    }
}