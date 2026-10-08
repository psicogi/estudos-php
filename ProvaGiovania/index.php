<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prova de Giovania</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="formulario">
        <form action="index.php" method="post">
            <label for="numero">Número da conta: </label>
            <br>
            <input type="text" name="numero" id="numero" required>
            <br>
            <label for="cliente">Cliente: </label>
            <br>
            <input type="text" name="cliente" id="cliente" required>
            <br>
            <label for="cpf">CPF: </label>
            <br>
            <input type="text" name="cpf" id="cpf" required>
            <br>
            <label for="telefone">Telefone: </label>
            <br>
            <input type="text" name="telefone" id="telefone" required>
            <br>
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email" required>
            <br>
            <label for="dataAbertura">Data da Abertura: </label>
            <br>
            <input type="text" name="dataAbertura" id="dataAbertura" required>
            <br>
            <label for="saldo">Saldo: </label>
            <br>
            <input type="text" name="saldo" id="saldo" required>
            <br>
            <input type="submit" value="Cadastrar Conta" id="botao">
            <input type="submit" value="Sacar Valor" id="botao">
        </form>
    </div>

    <?php
        require_once 'Conta.php';
        // colocar em um array ????????
        // esqueci como faz
        if (isset($_POST['numero']) && isset($_POST['cliente']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['dataAbertura']) && isset($_POST['saldo'])) {
            $numero = $_POST['numero'];
            $cliente = $_POST['cliente'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $dataAbertura = $_POST['dataAbertura'];
            $saldo = $_POST['saldo'];

            $conta = new Conta($numero, $cliente, $cpf, $telefone, $email, $dataAbertura, $saldo);
            $arquivo = fopen('clientes.txt', 'a+');
            fwrite($arquivo, "\n" . $conta -> gravar());
            fclose($arquivo);
        }
    ?>
</body>
</html>
