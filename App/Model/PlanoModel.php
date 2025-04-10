<?php

class PlanoModel {
    private $idplano;
    private $nome;
    private $valor;
    private $beneficios; // Texto ou array/JSON de benefícios

    public function __construct($idplano, $nome, $valor, $beneficios) {
        $this->idplano = $idplano;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->beneficios = $beneficios;
    }

    public function getIdPlano() {
        return $this->idplano;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getBeneficios() {
        return $this->beneficios;
    }

    public function setBeneficios($beneficios) {
        $this->beneficios = $beneficios;
    }
}
?>
