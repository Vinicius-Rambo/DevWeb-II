<?php

use App\Controller\SistemaController;
use App\Model\Sistema;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use Slim\Exception\HttpNotFoundException;

require_once(__DIR__ . '/vendor/autoload.php');

$app = AppFactory::create();
$app->setBasePath("/avaEx4"); //Adicionar o nome da pasta do projeto

// Parse json, form data and xml
$app->addBodyParsingMiddleware();
//$app->addRoutingMiddleware(); //Serve para adicionar tratamentos padrões para erros retornados pelos ENDPoints
$app->addErrorMiddleware(true, true, true); //Retorna um erro do Framework caso não tratado

//ROTAS
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Funcionou!");
    return $response;
});


//Sistemas
$app->get("/sistemas" , SistemaController::class . ":listar"); //Usado para visualizar padrão é get
$app->get("/sistemas/{id}",SistemaController::class  . ":buscarPorID");
$app->post("/sistemas",SistemaController::class . ":inserir"); //Padronizado o POST como item para inserir, podendo usar a mesma rota que o Listar (usa Get)
$app->delete("/sistemas/{id}", SistemaController::class . ":excluir");
$app->put("/sistemas/{id}", SistemaController::class . ":editar");


//Tratamento para rota não encontrada
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});


$app->run();
