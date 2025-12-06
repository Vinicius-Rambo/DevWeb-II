<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\ClubeDAO;
use App\Mapper\ClubeMapper;
use App\Service\ClubeService;
use App\Util\MensagemErro;

use \PDOException;
use Slim\Psr7\Message;

class ClubeController {

	private ClubeDAO $clubeDAO;
	private ClubeMapper $clubeMapper;
	private ClubeService $clubeService;

	public function __construct() {
		$this->clubeDAO = new ClubeDAO();
		$this->clubeMapper = new ClubeMapper();
		$this->clubeService = new ClubeService();
	}

	public function listar(Request $request, Response $response, array $args): Response {
		$clubes = $this->clubeDAO->list();
		//$response->getBody()->write(print_r($clubes, true));

		$json = json_encode($clubes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); //Convertendo
		$response->getBody()->write($json);

		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
    }

	
	public function inserir(Request $request, Response $response, array $args): Response {
		
		$clubeArray = $request->getParsedBody(); //Pega o array da requisição
		$clube = $this-> clubeMapper->mapFromJsonToObject(($clubeArray)); //Transforma o array em objeto
		$erro = $this->clubeService->validar($clube);

		if($erro) {
			$jsonErro = MensagemErro::getJSONErro($erro, "", 400); //Bad Request erro
			
			$response->getBody()->write($jsonErro);
			return $response->withHeader('Content-Type', 'application/json')->withStatus(400); //Bad Request  
		}
		try{
			$this->clubeDAO->insert($clube);//Chama o metodo do Dao para inserir no banco de dados
			$json = json_encode($clube, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json
			$response->getBody()->write($json);
			
			return $response->withHeader('Content-Type', 'application/json')->withStatus(201); //Criado 
			
		} catch(PDOException $e){
			$jsonErro = MensagemErro::getJSONErro("Erro ao inserir o clube!" , $e->getMessage(), 500);
			
			$response->getBody()->write($jsonErro);
			return $response->withHeader('Content-Type', 'application/json')->withStatus(500); //Erro 
			
		}
	}

	public function buscarPorID(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$clubes = $this->clubeDAO->findById($id);
		//$response->getBody()->write(print_r($clubes, true));
	
		$json = json_encode($clubes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		$response->getBody()->write($json);
	
		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
	}
	
	public function excluir(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$clubes = $this->clubeDAO->findById($id);

		if($clubes){
			try{
				$clubes = $this->clubeDAO->deleteById($id);
				$json = json_encode($clubes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
				$response->getBody()->write($json);
				return $response
				->withHeader('Content-Type', 'application/json')->withStatus(200);
			}
			catch(PDOException $e){
				$jsonErro = MensagemErro::getJSONErro("Erro ao deletar o clube!" , $e->getMessage(), 500);
			
				$response->getBody()->write($jsonErro);
				return $response->withHeader('Content-Type', 'application/json')->withStatus(500); //Erro 
			}
		}

		return $response->withStatus(404);

	}

	public function editar(Request $request, Response $response, array $args): Response {
		$id = $args["id"];
		$clubes = $this->clubeDAO->findById($id);

		if($clubes){
			$clubeArray = $request->getParsedBody(); //Pega o array da requisição
			$clube = $this-> clubeMapper->mapFromJsonToObject(($clubeArray)); //Transforma o array em objeto
			$erro = $this->clubeService->validar($clube);

			if($erro){
				$jsonErro = MensagemErro::getJSONErro($erro, "", 400); //Bad Request erro
				$response->getBody()->write($jsonErro);
				return $response->withHeader('Content-Type', 'application/json')->withStatus(400); //Bad Request  
			}

			try{
				$clube->setId($id);
				$clubes = $this->clubeDAO->update($clube);
				$json = json_encode($clubes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
				$response->getBody()->write($json);

				return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
			}

			catch(PDOException $e){
				$jsonErro = MensagemErro::getJSONErro("Erro ao atualizar o clube!" , $e->getMessage(), 500);
			
				$response->getBody()->write($jsonErro);
				return $response->withHeader('Content-Type', 'application/json')->withStatus(500); //Erro 
			}
		}

		return $response->withStatus(404); //not Found

	}

	
}