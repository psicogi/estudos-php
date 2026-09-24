<?php
    if(isset($_POST['nome'])) { // verifica se o formulário foi enviado
        $nome = $_POST['nome']; // pega o valor do campo nome
        $arquivo = fopen("alunos.txt", "a"); // abre o arquivo alunos.txt no modo append, se não existir ele cria, se existir ele adiciona no final do arquivo
        fwrite($arquivo, $nome . "\n"); // escreve o nome no arquivo alunos.txt
        fclose($arquivo); // fecha o arquivo alunos.txt
        echo "Aluno cadastrado com sucesso!"; // mensagem de sucesso
    }
?>