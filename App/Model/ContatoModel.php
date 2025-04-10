<?php

class ContatoModel {
    private $idcontato;
    private $nome;
    private $email;
    private $assunto;
    private $mensagem;
    private $data_envio;

    public function __construct($idcontato, $nome, $email, $assunto, $mensagem, $data_envio) {
        $this->idcontato = $idcontato;
        $this->nome = $nome;
        $this->email = $email;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
        $this->data_envio = $data_envio;
    }

    public function getIdContato() {
        return $this->idcontato;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    public function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function getDataEnvio() {
        return $this->data_envio;
    }

    public function setDataEnvio($data_envio) {
        $this->data_envio = $data_envio;
    }
}
?>
