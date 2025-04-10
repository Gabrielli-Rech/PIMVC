<?php

    class UserModel {
        //Atributos
        private $iduser;
        private $nomeuser;
        private $cpf;
        private $email;
        private $telefone;
        private $dataNascimeto;
        private $genero;
        private $endereco;
        private $cidade;
        private $estado;
        private $cep;
        private $senha;

        //Construtor
        public function __construct($iduser, $nomeuser, $cpf, $email, $confEmail, $telefone, 
        $dataNascimeto, $genero, $endereco, $cidade, $estado, $cep, $senha, $confSenha){
            $this -> iduser = $iduser;
            $this -> nomeuser = $nomeuser;
            $this -> cpf = $cpf;
            $this -> email = $email;
            $this -> telefone = $telefone;
            $this -> dataNascimento = $dataNascimeto;
            $this -> genero = $genero;
            $this -> endereco = $endereco;
            $this -> cidade = $cidade;
            $this -> estado = $estado;
            $this -> cep = $cep;
            $this -> senha = $senha;
        }
        public function getIdUser(){
            return $this -> iduser;
        }
        public function getNomeUser(){
            return $this -> nomeuser;
        }
        public function setNomeUser($nomeuser){
            $this -> nomeuser = $nomeuser;
            return $this;
        }
        public function getCPF(){
            return $this -> cpf;
        }
        public function setCPF($cpf){
            $this -> cpf = $cpf;
            return $this;
        }
        public function getEmail(){
            return $this -> email;
        }
        public function setEmail($email){
            $this -> email = $email;
            return $this;
        }
        public function getTelefone(){
            return $this -> telefone;
        }
        public function setTelefone($telefone){
            $this -> telefone = $telefone;
            return $this;
        }
        public function getDataNascimento(){
            return $this -> dataNascimento;
        }
        public function setDataNascimento($dataNascimento){
            $this -> dataNascimento = $dataNascimento;
            return $this;
        }
        public function getGenero(){
            return $this -> genero;
        }
        public function setGenero($genero){
            $this -> genero = $genero;
            return $this;
        }
        public function getEndereco(){
            return $this -> endereco;
        }
        public function setEndereco($endereco){
            $this -> endereco = $endereco;
            return $this;
        }
        public function getCidade(){
            return $this -> cidade;
        }
        public function setCidade($cidade){
            $this -> cidade = $cidade;
            return $this;
        }
        public function getEstado(){
            return $this -> estado;
        }
        public function setEstado($estado){
            $this -> estado = $estado;
            return $this;
        }
        public function getCEP(){
            return $this -> cep;
        }
        public function setCEP($cep){
            $this -> cep = $cep;
            return $this;
        }
        public function getSenha(){
            return $this -> senha;
        }
        public function setSenha($senha){
            $this -> senha = $senha;
            return $this;
        }
        public function cadastrarUser(UserModel $user){
            include_once '../DAO/UserDAO.php';
            $user = new UserDAO();
            $user -> cadastrarUser($this);
        }
        public function alterarUser(UserModel $user){
            include_once '../DAO/UserDAO.php';
            $user = new UserDAO();
            $user -> alterarUser($this);
        }
        public function excluirUser($iduser){
            include_once '../DAO/UserDAO.php';
            $user = new UserDAO();
            $user -> excluirUser($iduser);
        }
    }
?>