<?php


namespace Diego\Gerenciador\Helper;


trait MensagemDeAviso
{
    public function defineMensagem(string $tipo, string $mensagem)
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipoMensagem'] = $tipo;
    }
}