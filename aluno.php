<?php
// Incluir o arquivo de conexão ao banco de dados
include 'config.php';

// Verificar se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id_aluno = intval($_GET['id']); // Sanitizar o ID

    // Consulta ao banco de dados para buscar os dados do aluno
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
    $stmt->execute([$id_aluno]);
    $aluno = $stmt->fetch();

    if ($aluno) {
        // Exibir as informações do aluno
        echo "<h1>Bem-vindo, " . htmlspecialchars($aluno['nome']) . "</h1>";
        echo "<p><strong>ID do aluno:</strong> " . htmlspecialchars($aluno['id']) . "</p>";
        echo "<p><strong>Saldo de moedas:</strong> " . htmlspecialchars($aluno['saldo_moedas']) . "</p>";
        echo "<p><strong>Tarefas completadas:</strong> " . htmlspecialchars($aluno['tarefas_completadas']) . "</p>";
    } else {
        // Caso o aluno não seja encontrado
        echo "<p>Aluno não encontrado.</p>";
    }
} else {
    echo "<p>ID do aluno não fornecido.</p>";
}
?>
