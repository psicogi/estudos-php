<?php
class Conta
{
    const ARQUIVO = __DIR__ . '/contas.txt';

    private int $numero = 0;
    private string $cliente = '';
    private string $cpf = '';
    private string $telefone = '';
    private string $email = '';
    private string $dataAbertura = '';
    private float $saldo = 0.0;

    public function __construct(int $numero = 0, string $cliente = '', string $cpf = '',
                                string $telefone = '', string $email = '',
                                string $dataAbertura = '', float $saldo = 0.0)
    {
        $this->numero = $numero;
        $this->setCliente($cliente);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
        $this->setEmail($email);
        $this->setDataAbertura($dataAbertura);
        $this->saldo = $saldo;
    }

    // ---------- Getters ----------
    public function getNumero(): int        { return $this->numero; }
    public function getCliente(): string    { return $this->cliente; }
    public function getCpf(): string        { return $this->cpf; }
    public function getTelefone(): string   { return $this->telefone; }
    public function getEmail(): string      { return $this->email; }
    public function getDataAbertura(): string { return $this->dataAbertura; }
    public function getSaldo(): float       { return $this->saldo; }

    private function limpar(string $t): string
    {
        return trim(str_replace([';', "\r", "\n"], ' ', $t));
    }
    public function setNumero(int $v): void          { $this->numero = $v; }
    public function setCliente(string $v): void      { $this->cliente = $this->limpar($v); }
    public function setCpf(string $v): void          { $this->cpf = $this->limpar($v); }
    public function setTelefone(string $v): void     { $this->telefone = $this->limpar($v); }
    public function setEmail(string $v): void        { $this->email = $this->limpar($v); }
    public function setDataAbertura(string $v): void { $this->dataAbertura = $this->limpar($v); }

    private function paraLinha(): string
    {
        return implode(';', [
            $this->numero, $this->cliente, $this->cpf, $this->telefone,
            $this->email, $this->dataAbertura, number_format($this->saldo, 2, '.', '')
        ]);
    }

    private static function deLinha(string $linha): ?Conta
    {
        $p = explode(';', $linha);
        if (count($p) < 7) return null;
        return new Conta((int)$p[0], $p[1], $p[2], $p[3], $p[4], $p[5], (float)$p[6]);
    }

    public static function todas(): array
    {
        $contas = [];
        if (!file_exists(self::ARQUIVO)) return $contas;
        foreach (file(self::ARQUIVO, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $linha) {
            $c = self::deLinha($linha);
            if ($c) $contas[] = $c;
        }
        return $contas;
    }

    private static function salvarTodas(array $contas): bool
    {
        $texto = '';
        foreach ($contas as $c) $texto .= $c->paraLinha() . PHP_EOL;
        return file_put_contents(self::ARQUIVO, $texto, LOCK_EX) !== false;
    }

    public function gravar(): bool
    {
        if ($this->numero <= 0) return false;
        $contas = self::todas();
        foreach ($contas as $c) {
            if ($c->numero === $this->numero) return false;
        }
        $contas[] = $this;
        return self::salvarTodas($contas);
    }

    public function consultar(): bool
    {
        foreach (self::todas() as $c) {
            if ($c->numero === $this->numero) {
                $this->cliente      = $c->cliente;
                $this->cpf          = $c->cpf;
                $this->telefone     = $c->telefone;
                $this->email        = $c->email;
                $this->dataAbertura = $c->dataAbertura;
                $this->saldo        = $c->saldo;
                return true;
            }
        }
        return false;
    }

    public function alterar(): bool
    {
        $contas = self::todas();
        foreach ($contas as $i => $c) {
            if ($c->numero === $this->numero) {
                $contas[$i] = $this;
                return self::salvarTodas($contas);
            }
        }
        return false;
    }

    public function excluir(): bool
    {
        $contas = self::todas();
        $novas = array_values(array_filter($contas, fn($c) => $c->numero !== $this->numero));
        if (count($novas) === count($contas)) return false;
        return self::salvarTodas($novas);
    }

    public function sacar(float $valor): bool
    {
        if ($valor <= 0 || $valor > $this->saldo) return false;
        $this->saldo -= $valor;
        return $this->alterar();
    }

    public function depositar(float $valor): bool
    {
        if ($valor <= 0) return false;
        $this->saldo += $valor;
        return $this->alterar();
    }
}
