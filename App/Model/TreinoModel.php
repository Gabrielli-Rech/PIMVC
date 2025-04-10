<?php

class TreinoModel {
    private $idtreino;
    private $iduser; // Relacionado ao aluno
    private $nome;
    private $descricao;
    private $dias; // Ex: "Segunda, Quarta, Sexta"
    private $tempo;
    private $tipo;

    public function __construct($idtreino, $iduser, $nome, $descricao, $dias) {
        $this->idtreino = $idtreino;
        $this->iduser = $iduser;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->dias = $dias;
        $this->tempo = $tempo;
        $this->tipo = $tipo;
    }

    public function getIdTreino() {
        return $this->idtreino;
    }

    public function getIdUser() {
        return $this->iduser;
    }

    public function setIdUser($iduser) {
        $this->iduser = $iduser;
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

    public function getDias() {
        return $this->dias;
    }

    public function setDias($dias) {
        $this->dias = $dias;
    }
    public function getTempo() {
        return $this->tempo;
    }

    public function setTempo($tempo) {
        $this->tempo = $tempo;
    }
    
    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
?>
