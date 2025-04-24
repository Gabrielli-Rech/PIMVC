<?php
session_start();
require 'config.php'; // aqui deve estar sua conexão $pdo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeuser = $_POST['nomeuser'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['dataNascimento'];
    $genero = $_POST['genero'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $password = $_POST['password'];


    // Verificar se CPF já existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE cpf = ?");
    $stmt->execute([$cpf]);
    if ($stmt->fetchColumn() > 0) {
        echo "CPF já cadastrado.";
        exit;
    }

    // Inserção no banco
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO user
        (nomeuser, cpf, email, telefone, dataNascimento, genero, endereco, cidade, estado, cep, password) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $res = $stmt->execute([
        $nomeuser, $cpf, $email, $telefone, $data_nascimento, $genero,
        $endereco, $cidade, $estado, $cep, $hashed_password
    ]);

    if ($res) {
        echo "Cadastro realizado com sucesso!";
        // Você pode redirecionar aqui com header('Location: login.php'); 
    } else {
        echo "Erro ao cadastrar o usuário.";
    }
}
?>
