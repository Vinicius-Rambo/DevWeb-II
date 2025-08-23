<?php

define("DIR_ARQUIVOS", "arquivos"); //Constante do diretorio dos arquivos

function salvarDados($array, $arquivo){

    $json = json_encode($array, JSON_PRETTY_PRINT); //converte o array para Json (que é uma string). 
    file_put_contents( DIR_ARQUIVOS . "/" . $arquivo, $json); //Salvamento do Json no arquivo.
}

function buscarDados($arquivo) : array{ //Função com return tipado para array
    $dados = array();

    //Buscar os dados do arquivo
    $nomeArquivo = DIR_ARQUIVOS . "/" . $arquivo;

    if(file_exists($nomeArquivo)){ //Se existir um arquivo
        $json = file_get_contents($nomeArquivo); //Retorna o conteudo do arquivo.
        $dados = json_decode($json, true); //Converte o Json para array associativo
    }

    return $dados; // Retorna o array
}


?>