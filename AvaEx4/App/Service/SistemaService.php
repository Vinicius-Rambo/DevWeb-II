<?php 

namespace App\Service;

use App\Model\Sistema

class SistemaService{
    public function validar (Sistema $sistema){
        $erros = array();
        //validações

        //Se não receber algum dos valores empura o erro para dentro do array 
        if(!$sistema->getNome())array_push($erros, "informe o nome!"); //Não recebeu nome, adiciona a mensagem dentro do array.
        if(!$sistema->getDesenvolvedora())array_push($erros, "informe a Desenvolvedora do sistema!");
        if(!$sistema->getVersao())array_push($erros, "informe a versão mais recente!");
        if(!$sistema->getPadraoLancamento())array_push($erros, "informe o tipo de ciclo de lançamento!");
        if(!$sistema->getPacotesPadrao())array_push($erros, "informe o tipo de pacotes padrão!");
        if(!$sistema->getDerivado())array_push($erros, "informe a derivação do sistema!");
    
        return $erros;
    }
}
