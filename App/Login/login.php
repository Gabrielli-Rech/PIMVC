<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['nomeuser'];
    $password = $_POST['password'];

    // Consulta ao banco de dados para verificar o usuário
    $stmt = $pdo->prepare("SELECT * FROM user WHERE nomeuser = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: itens.php');
        exit();
    } else {
        $error = "Nome de usuário ou senha inválidos";
    }
}
?>