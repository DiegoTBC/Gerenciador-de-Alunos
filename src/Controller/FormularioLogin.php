<?php

namespace Diego\Gerenciador\Controller;

use Diego\Gerenciador\Helper\RenderizadorDeHTML;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioLogin implements RequestHandlerInterface
{
    use RenderizadorDeHTML;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizarHTMl('login/formulario-login.php', ['titulo' => 'Login']);

        return new Response(200, [], $html);
    }
}