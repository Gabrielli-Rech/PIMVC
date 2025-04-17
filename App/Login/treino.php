<?php
session_start();
require 'config.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Consulta ao banco de dados para obter os itens
$stmt = $pdo->query("SELECT * FROM items");
$itens = $stmt->fetchAll();
?>
