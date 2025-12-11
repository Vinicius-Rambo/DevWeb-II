<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\SistemaDAO;
use App\Mapper\SistemaMapper;
use App\Service\SistemaService;
use App\Util\MensagemErro;

use PDOException;

class SistemaController {

    private SistemaDAO $sistemaDAO;
    private SistemaMapper $sistemaMapper;
    private SistemaService $sistemaService;

    public function __construct() {
        $this->sistemaDAO = new SistemaDAO();
        $this->sistemaMapper = new SistemaMapper();
        $this->sistemaService = new SistemaService();
    }

    // LISTAR
    public function listar(Request $request, Response $response, array $args): Response {
        $sistemas = $this->sistemaDAO->list();

        $json = json_encode($sistemas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $response->getBody()->write($json);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    // BUSCAR POR ID
    public function buscarPorID(Request $request, Response $response, array $args): Response {
        $id = $args["id"];
        $sistema = $this->sistemaDAO->findById($id);

        if(!$sistema) {
            return $response->withStatus(404);
        }

        $json = json_encode($sistema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $response->getBody()->write($json);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    // INSERIR
    public function inserir(Request $request, Response $response, array $args): Response {
        $dataArray = $request->getParsedBody();
        $sistema = $this->sistemaMapper->mapFromJsonToObject($dataArray);

        $erro = $this->sistemaService->validar($sistema);

        if ($erro) {
            $jsonErro = MensagemErro::getJSONErro($erro, "", 400);
            $response->getBody()->write($jsonErro);
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }

        try {
            $this->sistemaDAO->insert($sistema);

            $json = json_encode($sistema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $response->getBody()->write($json);

            return $response->withHeader('Content-Type', 'application/json')->withStatus(201);

        } catch (PDOException $e) {
            $jsonErro = MensagemErro::getJSONErro("Erro ao inserir o sistema!", $e->getMessage(), 500);
            $response->getBody()->write($jsonErro);

            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }

    // EDITAR
    public function editar(Request $request, Response $response, array $args): Response {
        $id = $args["id"];
        $sistemaExistente = $this->sistemaDAO->findById($id);

        if (!$sistemaExistente) {
            return $response->withStatus(404);
        }

        $dataArray = $request->getParsedBody();
        $sistema = $this->sistemaMapper->mapFromJsonToObject($dataArray);

        $erro = $this->sistemaService->validar($sistema);

        if ($erro) {
            $jsonErro = MensagemErro::getJSONErro($erro, "", 400);
            $response->getBody()->write($jsonErro);
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }

        try {
            $sistema->setId($id);
            $sistemaEditado = $this->sistemaDAO->update($sistema);

            $json = json_encode($sistemaEditado, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $response->getBody()->write($json);

            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);

        } catch (PDOException $e) {
            $jsonErro = MensagemErro::getJSONErro("Erro ao atualizar o sistema!", $e->getMessage(), 500);
            $response->getBody()->write($jsonErro);

            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }

    // EXCLUIR
    public function excluir(Request $request, Response $response, array $args): Response {
        $id = $args["id"];
        $sistema = $this->sistemaDAO->findById($id);

        if(!$sistema){
            return $response->withStatus(404);
        }

        try {
            $this->sistemaDAO->deleteById($id);

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);

        } catch(PDOException $e){
            $jsonErro = MensagemErro::getJSONErro("Erro ao deletar o sistema!", $e->getMessage(), 500);
            $response->getBody()->write($jsonErro);

            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
    }
}
