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
        public function __construct($iduser, $nomeuser, $cpf, $email, $telefone, 
        $dataNascimeto, $genero, $endereco, $cidade, $estado, $cep, $senha){
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
        public function getduser(){
            return $this -> iduser;
        }
        public function getnomeuser(){
            return $this -> nomeuser;
        }
        public function setnomeuser($nomeuser){
            $this -> nomeuser = $nomeuser;
            return $this;
        }
        public function getcpf(){
            return $this -> cpf;
        }
        public function setcpf($cpf){
            $this -> cpf = $cpf;
            return $this;
        }
        public function getemail(){
            return $this -> email;
        }
        public function setemail($email){
            $this -> email = $email;
            return $this;
        }
        public function gettelefone(){
            return $this -> telefone;
        }
        public function settelefone($telefone){
            $this -> telefone = $telefone;
            return $this;
        }
        public function getdataNascimento(){
            return $this -> dataNascimento;
        }
        public function setdataNascimento($dataNascimento){
            $this -> dataNascimento = $dataNascimento;
            return $this;
        }
        public function getgenero(){
            return $this -> genero;
        }
        public function setgenero($genero){
            $this -> genero = $genero;
            return $this;
        }
        public function getendereco(){
            return $this -> endereco;
        }
        public function setendereco($endereco){
            $this -> endereco = $endereco;
            return $this;
        }
        public function getcidade(){
            return $this -> cidade;
        }
        public function setcidade($cidade){
            $this -> cidade = $cidade;
            return $this;
        }
        public function getestado(){
            return $this -> estado;
        }
        public function setestado($estado){
            $this -> estado = $estado;
            return $this;
        }
        public function getcep(){
            return $this -> cep;
        }
        public function setcep($cep){
            $this -> cep = $cep;
            return $this;
        }
        public function getsenha(){
            return $this -> senha;
        }
        public function setsenha($senha){
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