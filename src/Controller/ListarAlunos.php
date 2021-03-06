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

class ListarAlunos implements RequestHandlerInterface
{

    use RenderizadorDeHTML, MensagemDeAviso;

    private \Doctrine\Persistence\ObjectRepository $repositorioAlunos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioAlunos = $entityManager->getRepository(Aluno::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $alunos = $this->repositorioAlunos->findAll();
        $html = $this->renderizarHTMl('aluno/listar-alunos.php', ['alunos' => $alunos, 'titulo' => 'Lista de Alunos']);
        return new Response(200, [], $html);

        
    }
}