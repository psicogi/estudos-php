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
        $ano = 2026;
        $projeto = "Portifolio";
        $descricao = "Meu portifolio feito em HTML e PHP";
        $dataProjeto = "2026-09-16";
        $finalizado = true;
    ?>


    <h1> <?=$titulo?> <!-- maneira mais curta de imprimir variavel --> </h1>
    <p>
        <?php 
            echo $subtitulo;
        ?>
    </p>

    <p>
        <?php
            echo $ano;
        ?>
    </p>

    <hr>

    <div>
        <h2><?= $projeto?></h2>
        <p>
            <?php 
                echo $descricao;
            ?>
        </p>
        <div>
            <div><?=$dataProjeto?></div>
            <div> Projeto: 
                <?php if ($finalizado): ?> <!--sintaxe mais curta do if else-->
                    <span style="color: green;">finalizado ✅</span>
                <?php else: ?>
                    <span style="color: red;">não finalizado ❎</span>
                <?php endif; ?>
                <?php 

                    if ($finalizado) {
                        echo " finalizado ✅";
                    } else {
                        echo " não finalizado ❎";
                    }
                ?>
            </div>
        </div>

    </div>
    
</body>
</html>