<?php


namespace Diego\Gerenciador\Controller;

use Diego\Gerenciador\Helper\RenderizadorDeHTML;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{
    use RenderizadorDeHTML;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizarHTMl('aluno/formulario-aluno.php', ['titulo' => 'Novo Aluno']);
        return new Response(200, [], $html);
    }
}