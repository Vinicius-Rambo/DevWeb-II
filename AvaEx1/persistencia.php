<?php
define("DIR_BANCO", "banco_dados"); 

function salvarDados ($array, $arquivo){

    $json = json_encode($array, JSON_PRETTY_PRINT); //transforma o array em um Json bonito
    file_put_contents(DIR_BANCO . "/" . $arquivo, $json); //Salva o Json
}

function buscarDados($arquivo) : array { //Funcao com return tipado para array
    $dados = array();

    $nomeArquivo = DIR_BANCO . "/" . $arquivo;     //Buscar os dados do arquivo
    
    if(file_exists($nomeArquivo)) { //Se existir um arquivo
        $json = file_get_contents($nomeArquivo); //Retorna o conteudo do arquivo.
        $dados = json_decode($json, true); //Converte o Json para array associativo
    }

    return $dados;
}


?>
