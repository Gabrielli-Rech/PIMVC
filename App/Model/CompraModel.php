<?php

class CompraModel {
    private $idcompra;
    private $iduser;
    private $data;
    private $total;
    private $frete;
    private $quantidade;

    public function __construct($idcompra, $iduser, $data, $total, $frete, $quantidade) {
        $this->idcompra = $idcompra;
        $this->iduser = $iduser;
        $this->data = $data;
        $this->total = $total;
        $this->frete = $frete;
    }

    public function getIdCompra() {
        return $this->idcompra;
    }

    public function getIdUser() {
        return $this->iduser;
    }

    public function setIdUser($iduser) {
        $this->iduser = $iduser;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }
    public function getFrete() {
        return $this->frete;
    }

    public function setFrete($frete) {
        $this->frete = $frete;
    }
    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }
}
?>
