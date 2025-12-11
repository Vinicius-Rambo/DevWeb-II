<?php

use App\Controller\SistemaController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;

require_once(__DIR__ . '/vendor/autoload.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();  // <-- OBRIGATÓRIO
$app->addErrorMiddleware(true, true, true);

// ROTAS
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Funcionou!");
    return $response;
});

// Sistemas
$app->get("/sistemas", SistemaController::class . ":listar");
$app->get("/sistemas/{id}", SistemaController::class . ":buscarPorID");
$app->post("/sistemas", SistemaController::class . ":inserir");
$app->delete("/sistemas/{id}", SistemaController::class . ":excluir");
$app->put("/sistemas/{id}", SistemaController::class . ":editar");

// Tratamento de rota não encontrada
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});

$app->run();
