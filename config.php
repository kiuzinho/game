<?php
$host = 'localhost'; // Servidor do BD
$db = 'pssvjobv_game'; // Nome do banco de dados atualizado
$user = 'pssvjobv_akio'; // Usuário do MySQL
$pass = 'Akio2604*'; // Senha do MySQL (vazia no XAMPP por padrão)

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>
