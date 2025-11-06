<?php

include_once(__DIR__ . "/../include/header.php"); 
include_once(__DIR__ . "/../../controller/CursoController.php"); 
include_once(__DIR__ . "/../include/menu.php"); //Caminho absoluto

$cursoCont = new CursoController(); //Objeto para o metodo do curso controller
$cursos = $cursoCont->listar(); //Chamada do listar.
//print_r($cursos) 


?>


<h3><?= $aluno && $aluno->getId() > 0 ? 'Editar': 'Inserir' ?> aluno</h3>

<div class="row">

    <div class="col-6">
        <form method="POST" action="">

            <div class="mb-3"> <!--BootStrap para margim bottom-->
                <label for="txtNome" class="form-label">Nome:</label>
                <input type="text" id="txtNome" class="form-control" name="nome" value=" <?= $aluno ? $aluno->getNome() : '' ?>" 
                    placeholder="Informe o nome"> 
            </div>

            <div class="mb-3">
                <label for="txtIdade" class="form-label">Idade:</label>
                <input type="number" id="txtIdade" name="idade" class="form-control" value="<?= $aluno ? $aluno->getIdade() : '' ?>"
                    placeholder="Informe a idade">
            </div>

            <div class="mb-3">
                <label for="selEstrang" class="form-label" >Estrangeiro:</label>
                <select name="estrang" id="selEstrang" class="form-select">
                    <option value="">----Selecione----</option>
                    <option value="S" <?= $aluno && $aluno->getEstrangeiro() == 'S' ? 'selected' : '' ?>> Sim</option>
                    <option value="N" <?= $aluno && $aluno->getEstrangeiro() == 'N' ? 'selected' : '' ?>> Não</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="selCurso" class="form-label">Curso:</label>
                <select name="curso" id="selCurso" class="form-select">
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
</div>
    <div class="col-6">    
        <?php if ($msgErro): ?>
        <div class="alert alert-danger">
            <?= $msgErro ?>
        </div>
        <?php endif; ?>
    </div>
</div> <!--Fecha a row--> 
<div>
    <a href="listar.php" class="btn btn-outline-primary mt-4 ">Voltar</a>
</div>

<?php

include_once(__DIR__ . "/../include/footer.php"); //Caminho absoluto
?>