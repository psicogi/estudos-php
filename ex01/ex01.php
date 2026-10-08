<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>
<body>
    <form action="" method="get">
        <label for="nome">nome</label>
        <input type="text" name="nome" id="nome">
        <br>
        <br>
        <label for="idade">idade</label>
        <input type="text" name="idade" id="idade">
        <br>
        <br>
        <label for="cidade">cidade</label>
        <input type="text" name="cidade" id="cidade">
        <br>
        <br>
        <input type="submit" value="enviar">
    </form>

    <?php
        // verifica se o formulario no method get foi enviado, se sim, ele executa
        if(isset($_GET['nome']) && isset($_GET['idade']) && isset($_GET['cidade'])) {
            // guarda os resultados em variaveis
            $nome = $_GET['nome'];
            $idade = $_GET['idade'];
            $cidade = $_GET['cidade'];

            echo "<br>";

            // exibe o resultado
            echo "aluno cadastrado com sucesso!";
            echo "<hr>";
            echo "Nome: $nome <br>";
            echo "Idade: $idade <br>";
            echo "Cidade: $cidade <br>";
        }
    ?>
</body>
</html>