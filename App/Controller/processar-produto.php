<?php
require_once '../Controller/ProdutoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $frete = $_POST['frete'] ?? '';

    $controller = new ProdutoController();
    $sucesso = $controller->cadastrarProduto($nome, $preco, $descricao, $frete);

    if ($sucesso) {
        header('Location: ../View/index.html?msg=Produto cadastrado com sucesso');
    } else {
        header('Location: ../View/index.html?msg=Erro ao cadastrar produto');
    }
}
?>
