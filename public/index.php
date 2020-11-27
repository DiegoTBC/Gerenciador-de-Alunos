<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

session_start();

$ehRotaLogin = stripos($caminho, 'login');

if (!isset($_SESSION['logado']) && $ehRotaLogin === false) {
    header('Location: /login');
    exit();
}

$psr17Factory = new Psr17Factory();

//cria solicitações ao servidor
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

//requisição pronta
$serverRequest = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];

/** @var \Psr\Container\ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';

/** @var \Psr\Http\Server\RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora);

$resposta = $controlador->handle($serverRequest);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();
