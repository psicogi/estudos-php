<?php

class Produto
{
    private $produto;
    private $codigo;
    private $preco;
    private $quantidade;

    public function getProduto()
    {
        return $this -> produto;
    }

    public function setProduto($produto)
    {
        $this -> produto = $produto;
    }

    public function getCodigo()
    {
        return $this -> codigo;
    }

    public function setCodigo($codigo)
    {
        $this -> codigo = $codigo;
    }

    public function getPreco() {
        return $this -> preco;
    }

    public function setPreco($preco) {
        $this -> preco = $preco;
    }

    public function getQuantidade()
    {
        return $this -> quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this -> quantidade = $quantidade;
    }

    public function exibirRelatorio() {
        return "Produto cadastrado!" . "<br>" . $this -> getProduto() .  "<br>" . $this -> getCodigo() .  "<br>" . $this -> getPreco() . "<br>" . $this -> getQuantidade();
    }
}