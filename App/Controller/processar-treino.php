<?php
require_once '../Controller/TreinoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $tempo = $_POST['tempo'] ?? '';
    $dias = $_POST['dias'] ?? '';

    $controller = new TreinoController();
    $sucesso = $controller->cadastrarTreino($nome, $tipo, $descricao, $tempo, $dias);

    if ($sucesso) {
        header('Location: ../View/index.html?msg=Treino cadastrado com sucesso');
    } else {
        header('Location: ../View/index.html?msg=Erro ao cadastrar treino');
    }
}
?>
