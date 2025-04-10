<?php
require_once '../Model/ProdutoModel.php';
require_once '../DAO/ProdutoDAO.php';

class ProdutoController {
    public function cadastrarProduto($nome, $preco, $descricao, $frete) {
        $produto = new ProdutoModel();
        $produto->setNome($nome);
        $produto->setPreco($preco);
        $produto->setDescricao($descricao);
        $produto->setFrete($frete);

        $dao = new ProdutoDAO();
        return $dao->cadastrarProduto($produto);
    }

    public function listarProdutos() {
        $dao = new ProdutoDAO();
        return $dao->buscarTodos();
    }
}
?>
