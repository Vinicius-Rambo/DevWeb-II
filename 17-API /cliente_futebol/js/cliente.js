//Constante com a URL para as requisições à API
const URL_API = 'http://localhost:8082/futebol_api/clubes';

//Vincula o evento no botão "btnBuscar"
const btnBuscar = document.querySelector("#btnBuscar");
btnBuscar.addEventListener("click", buscarClubes);

//Vincula o evento no botão "btnBuscarAwait"
const btnBuscarAwait = document.querySelector("#btnBuscarAwait");
btnBuscarAwait.addEventListener("click", buscarClubesAwait);

//Vincula o evento no botão "btnInserir"
const btnInserir = document.querySelector("#btnInserir");
btnInserir.addEventListener("click", inserirClube);

//Utiliza o DOM para capturar a tabela tblClubes
const tblClubes = document.querySelector("#tblClubes");

//Utiliza o DOM para capturar os inputs de Nome, Cidade e Imagem
const inpNome = document.querySelector("#inpNome");
const inpCidade = document.querySelector("#inpCidade");
const inpImagem = document.querySelector("#inpImagem");


/***************************************************
 * 
 * FUNÇÕES
 * 
 ****************************************************/

/* BUSCAR XMLHttpRequest */
function buscarClubes() { //Metodo antigo, mais lento e mais verboso
   
    //Requisição para futebol_API
    var xhttp = new XMLHttpRequest(); //Raramente utilizado XMLH é triste
    xhttp.open("GET", URL_API);

    xhttp.onload = function(){
        //resposta do servidor
        var clubes = JSON.parse(xhttp.responseText);
        listarClubesTabela(clubes);
    }

    xhttp.send();
}


/* BUSCAR async await */
async function buscarClubesAwait() { //Versão mais moderna usando promisse.

    const options = { //Objeto JS 
        method: "GET"

    };
    var resp = await fetch(URL_API, options);
    var clubes = await resp.json();
    listarClubesTabela(clubes);


}


/* LISTAR TABELA - Função JavaScript para adicionar os clubes em uma tabela */
function listarClubesTabela(clubes) {
    //Limpa a tabela - linhas com os dados
    var arrayTBody = tblClubes.getElementsByTagName("tbody");
    var tBody = arrayTBody[0];
    while (tBody.children.length > 0)
        tBody.children[0].remove();

    //Percorre o array de clubes, criando as linhas/colunas da tabela
    clubes.forEach(clube => {
        //Linha
        var linha = tBody.insertRow();

        //Colunas ID, Nome e Cidade
        linha.insertCell().innerHTML = clube.id;
        linha.insertCell().innerHTML = clube.nome;
        linha.insertCell().innerHTML = clube.cidade;
        
        //Coluna Imagem
        var colImg = linha.insertCell();
        var img = document.createElement("img");
        img.setAttribute("src", clube.imagem);
        img.style.height = "50px";
        img.style.width = "auto";
        colImg.appendChild(img);

        //Coluna Excluir
        var colDel = linha.insertCell();
        var btnDel = document.createElement("button");
        btnDel.innerHTML = "Excluir";
        btnDel.className = "btn btn-danger";
        btnDel.addEventListener("click", function() { 
            if(confirm("Confirma a exclusão do clube?"))
                excluirClube(clube.id);
        });
        colDel.appendChild(btnDel);
    });
}


/* EXCLUIR */
async function excluirClube(idClube) {
    
    const opcoes = {
        method: "DELETE"
    };
    var resp = await fetch(URL_API + "/" + idClube, opcoes);

    if(resp.status == 200){
        buscarClubesAwait();
    } else {
        var jsonErro = await resp.text();
        alert(jsonErro);
    }
}


/* INSERIR */
async function inserirClube() {
    //Captura os valores dos inputs
    var nome = inpNome.value.trim();
    var cidade = inpCidade.value.trim();
    var imagem = inpImagem.value.trim();

    //Gerar o Jason com os dados
    const clube = {
        "nome": nome,
        "cidade": cidade,
        "imagem": imagem 
    };

    const json = JSON.stringify(clube);
    //alert(json)
    //chamada para API a fim de inserir.
    const opcoes = {
        method: "POST",
        body: json,
        headers: {
            'Content-type': 'application/json'
        }
    }   
}

