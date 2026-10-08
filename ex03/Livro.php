<?php

namespace ex03;

class Livro
{
    private $titulo;
    private $autor;
    private $ano;
    private $preco;

    public function __construct($titulo, $autor, $ano, $preco) {
        $this -> titulo = $titulo;
        $this -> autor = $autor;
        $this -> ano = $ano;
        $this -> preco = $preco;
    }

    public function setTitutlo($titulo) {
        $this -> titulo = $titulo;
    }
    public function getTitulo() {
        return $this -> titulo;
    }

    public function setAutor($autor) {
        $this -> autor = $autor;
    }

    public function getAutor() {
        return $this -> autor;
    }

    public function setAno($ano) {
        $this -> ano = $ano;
    }

    public function getAno() {
        return $this -> ano;
    }

    public function setPreco($preco) {
        $this -> preco = $preco;
    }

    public function getPreco() {
        return $this -> preco;
    }

    public function relatorio() {
        return "Titulo: " . $this -> getTitulo() . "<br>" . "Autor: " . $this -> getAutor() . "<br>" . "Ano: " . $this -> getAno() . "<br>" . "Preço: " . $this -> getPreco();
    }
}