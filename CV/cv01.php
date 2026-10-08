<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercicio 01 do Curso em Video</title>
</head>
<body>
    <h1>Dados do servidor</h1>
    <?php
        date_default_timezone_set('America/Sao_Paulo');
        echo "hoje é dia " . date("d/m/Y ");
        echo "as " . date("G:i:s");
    ?>
</body>
</html>