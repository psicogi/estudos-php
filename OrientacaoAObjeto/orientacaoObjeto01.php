<?php

    include_once 'Produto.php';

    if (isset($_POST['codigo']) and isset($_POST['produto']) and isset($_POST['preco']) and isset($_POST['quantidade'])) {
        $produto1 = new Produto();
        $produto1->setCodigo($_POST['codigo']);
        $produto1->setProduto($_POST['produto']);
        $produto1->setPreco($_POST['preco']);
        $produto1->setQuantidade($_POST['quantidade']);

        $produtos = fopen("produtos.txt", 'a+');
        fwrite($produtos, "Codigo: " . $produto1 -> getCodigo() . " | " .
            "Produto: " . $produto1 -> getProduto() . " | " .
            "Preço: " . $produto1 -> getPreco() . " | " .
            "Quantidade: " . $produto1 -> getQuantidade() . "\n");

        fclose($produtos);

        echo $produto1->exibirRelatorio();
    }
