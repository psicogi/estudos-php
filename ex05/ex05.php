<?php
    $numeros = [4, 5, 6, 7, 10];
    $par = 0;
    $total = 0;
    $maior = $numeros[0];
    $menor = $numeros[0];

    foreach ($numeros as $numero) {
        if ($numero % 2 == 0) {
            $par += 1;
        }

        if ($numero > $maior) {
            $maior = $numero;
        }

        if ($numero < $menor) {
            $menor = $numero;
        }

        $total += $numero;
    }

    echo $par . " numeros sao pares";
    echo "<br>";
    echo "maior numero: " . $maior;
    echo "<br>";
    echo "menor numero: " . $menor;
?>