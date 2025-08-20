
<h2>Dados do Veículo</h2> <!-- veiculo_form.php -->
<form method="POST" action="veiculo_exec.php">
    <input name="modelo" placeholder="Informe o modelo" />
    <br><br>
    <input name="marca" placeholder="Informe a marca" />
    <br><br>
    <select name="combustivel">
        <option value="">--Selecione o combustível---</option>
        <option value="A">Álcool</option>
        <option value="G">Gasolina</option>
        <option value="F">Flex</option>
    </select>
    <br><br>
    <button type="submit">Enviar</button>
</form>