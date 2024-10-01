<?php
// Incluir o arquivo de conexão ao banco de dados
include 'config.php';

// Inicializar variáveis
$id_aluno = '';
$moedas = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar e obter os dados do formulário
    $id_aluno = intval($_POST['id_aluno']);
    $moedas = intval($_POST['moedas']);

    // Atualizar saldo de moedas no banco de dados
    try {
        // Consultar o saldo atual
        $stmt = $pdo->prepare("SELECT saldo_moedas FROM alunos WHERE id = ?");
        $stmt->execute([$id_aluno]);
        $aluno = $stmt->fetch();

        if ($aluno) {
            $novo_saldo = $aluno['saldo_moedas'] + $moedas; // Adicionar ou subtrair as moedas
            $stmt = $pdo->prepare("UPDATE alunos SET saldo_moedas = ? WHERE id = ?");
            $stmt->execute([$novo_saldo, $id_aluno]);
            $message = "Saldo de moedas atualizado com sucesso!";
        } else {
            $message = "Aluno não encontrado.";
        }
    } catch (PDOException $e) {
        $message = "Erro ao atualizar o saldo: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Moedas</title>
</head>
<body>
    <h1>Atualizar Saldo de Moedas dos Alunos</h1>

    <form method="POST" action="">
        <label for="id_aluno">ID do Aluno:</label>
        <input type="number" id="id_aluno" name="id_aluno" required>
        
        <label for="moedas">Moedas a adicionar ou diminuir:</label>
        <input type="number" id="moedas" name="moedas" required>
        
        <button type="submit">Atualizar Moedas</button>
    </form>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>
