<!-- PHP e HTML são compativeis-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios Top</title>
</head>
<body>
    <h1>Formularios</h1>
     <!--Por padrão o Method é GET -->
    <form action="processa.php" method="POST">
        <input type="text" name="nome" placeholder="informe o nome">

        <br><br>

        <input type="number" name="idade" placeholder="informe a idade">

        <br><br>

        <button type="submit"> Enviar </button> 

    </form>
    
</body>
</html>