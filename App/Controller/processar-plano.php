<?php
require_once '../Controller/PlanoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $beneficio = $_POST['beneficio'] ?? '';

    $controller = new PlanoController();
    $sucesso = $controller->cadastrarPlano($nome, $valor, $beneficio);

    if ($sucesso) {
        header('Location: ../View/index.html?msg=Plano cadastrado com sucesso');
    } else {
        header('Location: ../View/index.html?msg=Erro ao cadastrar plano');
    }
}
?>
