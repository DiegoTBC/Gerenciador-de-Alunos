<?php


namespace Diego\Gerenciador\Helper;


trait RenderizadorDeHTML
{
    public function renderizarHTMl(string $caminho, array $dados)
    {
        extract($dados);
        ob_start();
        require __DIR__ . '/../../view/' . $caminho;
        $html = ob_get_clean();

        return $html;
    }
}