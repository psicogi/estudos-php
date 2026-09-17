<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>primeiro exemplo com php</title>
</head>
<body>

    <?php 
    //  criando variavel
        $saudacao = "ola, meus amigos!";
        $nome = "gi";
        $titulo = $saudacao . " portifolio da " . $nome;
        $subtitulo = "Seja bem vindo ao meu portifolio";
    ?>


    <h1>
        <?=$titulo?> <!-- maneira mais curta de imprimir variavel -->
    </h1>
    <p>
        <?php 
            echo $subtitulo;
        ?>
    </p>
    
</body>
</html>