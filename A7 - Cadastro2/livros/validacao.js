function validar(){
   var titulo = document.querySelector("#titulo").value; //Por QuerySelector
   var genero = document.getElementById("genero").value; //Por getElementByID

   var divErro = document.querySelector("#divErro");

   //console.log(titulo + "-" + genero);+
   
    if(titulo.trim() == ''){
        divErro.innerHTML = "Informe o titulo!";
        return false;

    }else if(genero.trim() == ''){
        divErro.innerHTML = "Informe o Gênero!";
        return false;
    }




return true;} //Caso ambos os campos sejam verdadeiros.