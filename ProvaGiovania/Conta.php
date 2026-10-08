<?php

class Conta
{
    private $numero;
    private $cliente;
    private $cpf;
    private $telefone;
    private $email;
    private $dataAbertura;
    private $saldo;

    public function __construct($numero, $cliente, $cpf, $telefone, $email, $dataAbertura, float $saldo)
    {
        $this->numero = $numero;
        $this->cliente = $cliente;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->dataAbertura = $dataAbertura;
        $this->saldo = $saldo;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getDataAbertura()
    {
        return $this->dataAbertura;
    }

    public function setDataAbertura($dataAbertura): void
    {
        $this->dataAbertura = $dataAbertura;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($saldo): void
    {
        $this->saldo = $saldo;
    }

    public function gravar() {
        return "Numero: " . $this->numero . " | " . "Cliente: " . $this->cliente . " | " . "Cpf: " . $this->cpf . " | " . "Telefone: " . "Email: " . $this->email . " | " . "Data da Abertura: " . $this->dataAbertura . " | " . "Saldo: " . $this->saldo;
    }

    // ESQUECI COMO VALIDAR E EXCLUIR O DADO
    public function excluir($numero, $cliente, $cpf, $telefone, $email, $dataAbertura, $saldo) {
//        if ($numero == $this->numero && $cliente == $this->cliente && $cpf == $this->cpf && $telefone == $this->telefone && $email == $this->email && $dataAbertura == $this->dataAbertura && $saldo == $this->saldo) {
//
//        }
    }

    public function sacar($valor) {
        if ($valor > 0 && $valor < $this->saldo) {
            $this->saldo -= $valor;
        } else {
            echo "saldo insuficiente";
        }
    }

    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
        } else {
            echo "saldo insuficiente";
        }
    }

}