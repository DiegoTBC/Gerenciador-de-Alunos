<?php


namespace Diego\Gerenciador\Controller;


use Diego\Gerenciador\Entity\Aluno;
use Diego\Gerenciador\Helper\MensagemDeAviso;
use Diego\Gerenciador\Helper\RenderizadorDeHTML;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHTML, MensagemDeAviso;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;
    private \Doctrine\Persistence\ObjectRepository $repositorioAlunos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioAlunos = $entityManager->getRepository(Aluno::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Usuário não encontrado');
            return new Response(302, ['Location' => '/listar-cursos']);
        }

        $aluno = $this->repositorioAlunos->find($id);
        $html = $this->renderizarHTMl('aluno/formulario-aluno.php', ['titulo' => 'Editar Aluno', 'aluno' => $aluno]);
        return new Response(200, [], $html);
    }
}