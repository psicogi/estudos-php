<?php
require_once 'Conta.php';

$msg = '';
$tipo = 'ok';
$editando = new Conta();

function dados(): Conta {
    return new Conta(
        (int)($_POST['numero'] ?? 0),
        $_POST['cliente'] ?? '',
        $_POST['cpf'] ?? '',
        $_POST['telefone'] ?? '',
        $_POST['email'] ?? '',
        $_POST['dataAbertura'] ?? '',
        (float)str_replace(',', '.', $_POST['saldo'] ?? '0')
    );
}

// Carrega uma conta para edição (link "Editar" da tabela ou botão Consultar)
if (isset($_GET['consultar'])) {
    $editando = new Conta((int)$_GET['consultar']);
    if (!$editando->consultar()) { $msg = 'Conta não encontrada.'; $tipo = 'erro'; }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao  = $_POST['acao'] ?? '';
    $conta = dados();
    $valor = (float)str_replace(',', '.', $_POST['valor'] ?? '0');

    switch ($acao) {
        case 'gravar':
            $ok = $conta->gravar();
            $msg = $ok ? 'Conta cadastrada com sucesso!' : 'Erro: número inválido ou já existente.';
            break;
        case 'consultar':
            $editando = new Conta($conta->getNumero());
            $ok = $editando->consultar();
            $msg = $ok ? 'Conta encontrada.' : 'Conta não encontrada.';
            break;
        case 'alterar':
            $ok = $conta->alterar();
            $msg = $ok ? 'Dados atualizados!' : 'Erro: conta não encontrada.';
            break;
        case 'excluir':
            $ok = $conta->excluir();
            $msg = $ok ? 'Conta excluída!' : 'Erro: conta não encontrada.';
            break;
        case 'sacar':
        case 'depositar':
            $c = new Conta((int)($_POST['numeroOp'] ?? 0));
            if (!$c->consultar()) { $ok = false; $msg = 'Conta não encontrada.'; break; }
            $ok = $c->$acao($valor);
            $msg = $ok ? ucfirst($acao) . ' realizado! Novo saldo: R$ ' . number_format($c->getSaldo(), 2, ',', '.')
                       : 'Operação inválida (valor incorreto ou saldo insuficiente).';
            break;
        default:
            $ok = false; $msg = 'Ação desconhecida.';
    }
    $tipo = $ok ? 'ok' : 'erro';
}

$contas = Conta::todas(); // array de objetos Conta
$e = fn($s) => htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Banco - Cadastro de Contas</title>
<style>
  body { font-family: Arial, sans-serif; background:#f2f4f7; margin:0; padding:20px; color:#222; }
  .box { max-width:900px; margin:0 auto 20px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 1px 4px #0002; }
  h1 { text-align:center; } h2 { margin-top:0; }
  label { display:block; margin:8px 0 2px; font-size:14px; }
  input { width:100%; padding:8px; box-sizing:border-box; border:1px solid #bbb; border-radius:4px; }
  .grid { display:grid; grid-template-columns:1fr 1fr; gap:0 16px; }
  button { padding:9px 14px; margin:12px 6px 0 0; border:0; border-radius:4px; background:#1f6feb; color:#fff; cursor:pointer; }
  button.red { background:#d1342f; } button.green { background:#2a9d4b; } button.gray { background:#666; }
  table { width:100%; border-collapse:collapse; font-size:14px; }
  th, td { padding:8px; border-bottom:1px solid #ddd; text-align:left; }
  th { background:#eef1f5; }
  .msg { max-width:900px; margin:0 auto 20px; padding:12px; border-radius:6px; }
  .ok { background:#d9f2e0; color:#14532d; } .erro { background:#fbdcdc; color:#7f1d1d; }
  form.inline { display:inline; } form.inline button { margin:0; padding:4px 8px; }
</style>
</head>
<body>
<h1>Banco - Cadastro de Contas</h1>

<?php if ($msg): ?><div class="msg <?= $tipo ?>"><?= $e($msg) ?></div><?php endif; ?>

<div class="box">
  <h2>Dados do cliente / conta</h2>
  <form method="post">
    <div class="grid">
      <div><label>Número da conta</label>
        <input type="number" name="numero" min="1" required value="<?= $editando->getNumero() ?: '' ?>"></div>
      <div><label>Cliente</label>
        <input type="text" name="cliente" value="<?= $e($editando->getCliente()) ?>"></div>
      <div><label>CPF</label>
        <input type="text" name="cpf" value="<?= $e($editando->getCpf()) ?>"></div>
      <div><label>Telefone</label>
        <input type="text" name="telefone" value="<?= $e($editando->getTelefone()) ?>"></div>
      <div><label>E-mail</label>
        <input type="email" name="email" value="<?= $e($editando->getEmail()) ?>"></div>
      <div><label>Data de abertura</label>
        <input type="date" name="dataAbertura" value="<?= $e($editando->getDataAbertura() ?: date('Y-m-d')) ?>"></div>
      <div><label>Saldo inicial (R$)</label>
        <input type="number" step="0.01" name="saldo" value="<?= number_format($editando->getSaldo(), 2, '.', '') ?>"></div>
    </div>
    <button name="acao" value="gravar">Cadastrar</button>
    <button name="acao" value="consultar" class="gray" formnovalidate>Consultar</button>
    <button name="acao" value="alterar" class="green">Alterar</button>
    <button name="acao" value="excluir" class="red" formnovalidate
            onclick="return confirm('Excluir esta conta?')">Excluir</button>
  </form>
  <p style="font-size:13px;color:#555">Para alterar, informe o número, clique em <b>Consultar</b>, edite os campos e clique em <b>Alterar</b>. O saldo só muda por saque/depósito abaixo.</p>
</div>

<div class="box">
  <h2>Saque / Depósito</h2>
  <form method="post">
    <div class="grid">
      <div><label>Número da conta</label><input type="number" name="numeroOp" min="1" required></div>
      <div><label>Valor (R$)</label><input type="number" step="0.01" min="0.01" name="valor" required></div>
    </div>
    <button name="acao" value="sacar" class="red">Sacar</button>
    <button name="acao" value="depositar" class="green">Depositar</button>
  </form>
</div>

<div class="box">
  <h2>Contas cadastradas (<?= count($contas) ?>)</h2>
  <div style="overflow-x:auto">
  <table>
    <tr><th>Nº</th><th>Cliente</th><th>CPF</th><th>Telefone</th><th>E-mail</th><th>Abertura</th><th>Saldo</th><th></th></tr>
    <?php foreach ($contas as $c): ?>
      <tr>
        <td><?= $c->getNumero() ?></td>
        <td><?= $e($c->getCliente()) ?></td>
        <td><?= $e($c->getCpf()) ?></td>
        <td><?= $e($c->getTelefone()) ?></td>
        <td><?= $e($c->getEmail()) ?></td>
        <td><?= $e($c->getDataAbertura()) ?></td>
        <td>R$ <?= number_format($c->getSaldo(), 2, ',', '.') ?></td>
        <td><a href="?consultar=<?= $c->getNumero() ?>">Editar</a></td>
      </tr>
    <?php endforeach; ?>
    <?php if (!$contas): ?><tr><td colspan="8">Nenhuma conta cadastrada.</td></tr><?php endif; ?>
  </table>
  </div>
</div>
</body>
</html>
