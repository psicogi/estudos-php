<?php
    // abre o arquivo linguagens.txt no modo escrita, se não existir ele cria
    $arquivo = fopen("linguagens.txt", "w"); // w = modo escrita, se não existir ele cria, se existir ele apaga o conteúdo e escreve de novo


    // escreve no arquivo linguagens.txt
    fwrite($arquivo, "Java\n");
    fwrite($arquivo, "PHP\n");
    fwrite($arquivo, "Golang\n");

    // fecha o arquivo linguagens.txt
    fclose($arquivo);

    echo "Arquivo criado com sucesso!";

    echo "<hr>";

    $arquivo = fopen("linguagens.txt", "a"); // a = modo append, se não existir ele cria, se existir ele adiciona no final do arquivo

    fwrite($arquivo, "Python\n");
    fwrite($arquivo, "JavaScript\n");

    fclose($arquivo);

    echo "Arquivo atualizado com sucesso!";

    echo "<hr>";

    $arquivo = fopen("linguagens.txt", "r"); // r = modo leitura, se não existir ele retorna erro

    while (!feof($arquivo)) { // feof = end of file, enquanto não chegar no final do arquivo
        $linha = fgets($arquivo); // lê uma linha do arquivo
        echo $linha . "<br>"; // imprime a linha lida
    }
    fclose($arquivo);
?>