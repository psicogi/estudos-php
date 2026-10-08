<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercicio 3</title>
</head>
<body>
    <form action="ex03.php" method="post">
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <br>
        <label for="autor">Autor: </label>
        <input type="text" name="autor" id="autor">
        <br>
        <br>
        <label for="ano">Ano: </label>
        <input type="text" name="ano" id="ano">
        <br>
        <br>
        <label for="preco">Preço: </label>
        <input type="text" name="preco" id="preco">
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        require_once 'Livro.php';
        if (isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['ano']) && isset($_POST['preco'])) {
            $livro = new \ex03\Livro($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['preco']);

            $arquivo = fopen('livros.txt', 'a');
            fwrite($arquivo, "\n" . $livro -> getTitulo() . " | " . $livro -> getAutor() . " | " . $livro -> getAno() . " | " . $livro -> getPreco());
            fclose($arquivo);

            echo $livro -> relatorio();
        }
    ?>
</body>
</html>