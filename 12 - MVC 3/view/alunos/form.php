<?php

include_once(__DIR__ . "/../include/header.php"); 
include_once(__DIR__ . "/../../controller/CursoController.php"); 

$cursoCont = new CursoController(); //Objeto para o metodo do curso controller
$cursos = $cursoCont->listar(); //Chamada do listar.
//print_r($cursos) 


?>


<h3><?= $aluno && $aluno->getId() > 0 ? 'Editar': 'Inserir' ?> aluno</h3>

<form method="POST" action="">

    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" id="txtNome" name="nome" value=" <?= $aluno ? $aluno->getNome() : '' ?>" 
            placeholder="Informe o nome"> 
    </div>

    <div>
        <label for="txtIdade">Idade:</label>
        <input type="number" id="txtIdade" name="idade" value="<?= $aluno ? $aluno->getIdade() : '' ?>"
            placeholder="Informe a idade">
    </div>

    <div>
        <label for="selEstrang">Estrangeiro:</label>
        <select name="estrang" id="selEstrang">
            <option value="">----Selecione----</option>
            <option value="S" <?= $aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '' ?>> Sim</option>
            <option value="N" <?= $aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '' ?>> Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso:</label>
        <select name="curso" id="selCurso">
            <option value="">----Selecione----</option>

            <?php foreach($cursos as $c): ?>
                <option value="<?= $c->getId(); ?>" 
                    <?php if($aluno && $aluno->getCurso() && $aluno->getCurso() -> getId() == $c->getId())echo "selected";  ?>> <?= $c->getNomeTurno() ?> </option>
            <?php endforeach; ?>

        </select>
    </div>

    <input name="id" type="hidden" value="<?= $aluno ? $aluno->getId() : 0 ?>">

    <div class="mt-2">
        <button type="submit" 
            class="btn btn-success">Gravar</button>
    </div>

</form>
     
<div style="color: red;">
    <?= $msgErro ?>
</div>

<div>
    <a href="listar.php">Voltar</a>
</div>

<?php

include_once(__DIR__ . "/../include/footer.php"); //Caminho absoluto
?>