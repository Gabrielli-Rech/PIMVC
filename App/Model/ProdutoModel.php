<?php

class ProdutoModel {
    private $idproduto;
    private $nome;
    private $descricao;
    private $preco;
    private $frete;

    public function __construct($idproduto, $nome, $descricao, $preco, $frete) {
        $this->idproduto = $idproduto;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->frete = $frete;
    }

    public function getIdProduto() {
        return $this->idproduto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getFrete() {
        return $this->frete;
    }

    public function setFrete($frete) {
        $this->frete = $frete;
    }
}
?>
