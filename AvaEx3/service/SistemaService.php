<?php
include_once(__DIR__ . "/../model/Sistema.php");
class SistemaService{
    public function validar (Sistema $sistema){
        $erros = array();

        //validações
        
        if(!$sistema->getNome())array_push($erros, "informe o nome!");
        if(!$sistema->getDesenvolvedora())array_push($erros, "informe a Desenvolvedora do sistema!");
        if(!$sistema->getVersao())array_push($erros, "informe a versão mais recente!");
        if(!$sistema->getPadraoLancamento())array_push($erros, "informe o tipo de ciclo de lançamento!");
        if(!$sistema->getPacotesPadrao())array_push($erros, "informe o tipo de pacotes padrão!");
        if(!$sistema->getDerivado())array_push($erros, "informe a derivação do sistema!");
    
        return $erros;
    }
}

?>