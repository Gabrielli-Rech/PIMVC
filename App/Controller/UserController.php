<?php
require_once '../Model/UserModel.php';
require_once '../DAO/UserDAO.php';

class UserController {

    

    public static function ($nomeuser, $cpf, $email, $telefone, $dataNascimento, $genero, $endereço, $cidade, $estado, $cep, $senha) {
        $this->userDAO = new UserDAO();
    }

    public function cadastraruser($dados) {
        // Validação: confere se e-mail e senha coincidem com a confirmação
        echo $dados['email']."      ".$dados['senha'];
        if (!($dados['email']) || !($dados['senha'])) {
            
            return ['erro' => 'E-mail ou senha não conferem com a confirmação.'];
        }
    
        $user = new UserModel(
            null,
            $dados['nomeuser'],
            $dados['cpf'],
            $dados['email'],
            $dados['telefone'],
            $dados['dataNascimento'],
            $dados['genero'],
            $dados['endereco'],
            $dados['cidade'],
            $dados['estado'],
            $dados['cep'],
            $dados['senha']
        );
    
        return $this->userDAO->cadastrarUser($user);
    }
    

    public function atualizar($dados) {
        if ($dados['email'] !== $dados['confEmail'] || $dados['senha'] !== $dados['confSenha']) {
            return ['erro' => 'E-mail ou senha não conferem com a confirmação.'];
        }

        $user = new UserModel(
            $dados['iduser'],
            $dados['nomeuser'],
            $dados['cpf'],
            $dados['email'],
            $dados['telefone'],
            $dados['dataNascimento'],
            $dados['genero'],
            $dados['endereco'],
            $dados['cidade'],
            $dados['estado'],
            $dados['cep'],
            $dados['senha'],
        );

        return $this->userDAO->alterarUser($user);
    }

    public function excluir($iduser) {
        return $this->userDAO->excluirUser($iduser);
    }

    public function listarTodos() {
        return $this->userDAO->buscarTodos();
    }

    public function buscarPorCPF($cpf) {
        return $this->userDAO->buscarPorCPF($cpf);
    }
}
?>
