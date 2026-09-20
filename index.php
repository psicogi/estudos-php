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
        $titulo = $saudacao . " portfolio da " . $nome;
        $subtitulo = "Seja bem vindo ao meu portfolio";
        $ano = 2026;
        $projeto = "Portfolio";
        $descricao = "Meu portfolio feito em HTML e PHP";
        $dataProjeto = "2026-09-16";
        $finalizado = true;
        $projetos = [
            [
                "nome" => "Meu Portfolio",
                "finalizado" => true,
                "data" => "2026-09-16",
                "descricao" => "Meu portfolio feito em HTML e PHP"
            ],
            [
                "nome" => "Gerenciador de Tarefas KanBan",
                "finalizado" => false,
                "data" => "2026-10-01",
                "descricao" => "Sistema de gerenciamento de tarefas em formato KanBan"
            ],
            [
                "nome" => "Sistema de Cadastro de Clientes",
                "finalizado" => true,
                "data" => "2026-11-15",
                "descricao" => "Sistema de cadastro de clientes com banco de dados"
            ],
            [
                "nome" => "Tela de Login e Cadastro de Usuários",
                "finalizado" => false,
                "data" => "2026-12-01",
                "descricao" => "Tela de login e cadastro de usuários com validação"
            ]
        ];

        function verificarFinalizacao($p) {
            if ($p["finalizado"]) {
                return '<span style="color: green;">finalizado ✅</span>';
            } else {
                return '<span style="color: red;">não finalizado ❎</span>';
            }
        }
    ?>


    <h1><?=$titulo?> <!-- maneira mais curta de imprimir variavel --></h1>
    <p><?=$subtitulo;?></p>
    <p><?=$ano;?></p>


    <hr>


    <ul>
        <!--           para cada    projeto dentro de projetoS faça isso aqui -->
        <?php foreach ($projetos as $projeto): ?>
            <div
                <?php if ((2026 - $ano) > 2 ): ?>
                    style="background-color: cadetblue;"
                <?php else: ?>
                    style="background-color: lightcoral;"
                <?php endif; ?>>
                

                <h2><?= $projeto["nome"] ?></h2>
                <p><?=$projeto["descricao"];?></p>
                <div>
                    <div><?=$projeto["data"]?></div>
                    <div> Projeto: 
                        <?= verificarFinalizacao($projeto);?>

                        <!-- <?php if ($projeto["finalizado"]): ?> <!--sintaxe mais curta do if else-->
                            <!-- <span style="color: green;">finalizado ✅</span> -->
                        <?php else: ?>
                            <span style="color: red;">não finalizado ❎</span>
                        <?php endif; ?>
                        <!-- <?php 

                            // if ($projeto["finalizado"]) {
                            //     echo " finalizado ✅";
                            // } else {
                            //     echo " não finalizado ❎";
                            // }
                        ?> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </ul>
</body>
</html>