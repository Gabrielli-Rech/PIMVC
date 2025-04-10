<?php
require_once '../db/Conexao.php'; // Ajuste o caminho conforme sua estrutura
class UserDAO {

    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao(); // Método estático que retorna PDO
    }

    public function cadastrarUser(UserModel $user) {
        try {
            $sql = "INSERT INTO users 
                (nomeuser, cpf, email, telefone, dataNascimento, genero, endereco, cidade, estado, cep, senha) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $user->getNomeUser(),
                $user->getCPF(),
                $user->getEmail(),
                $user->getTelefone(),
                $user->getDataNascimento(),
                $user->getGenero(),
                $user->getEndereco(),
                $user->getCidade(),
                $user->getEstado(),
                $user->getCEP(),
                password_hash($user->getSenha(), PASSWORD_DEFAULT)
            ]);

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
            return false;
        }
    }

    public function alterarUser(UserModel $user) {
        try {
            $sql = "UPDATE users SET 
                nomeuser = ?, cpf = ?, email = ?, telefone = ?, dataNascimento = ?, genero = ?, 
                endereco = ?, cidade = ?, estado = ?, cep = ?, senha = ? 
                WHERE iduser = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $user->getNomeUser(),
                $user->getCPF(),
                $user->getEmail(),
                $user->getTelefone(),
                $user->getDataNascimento(),
                $user->getGenero(),
                $user->getEndereco(),
                $user->getCidade(),
                $user->getEstado(),
                $user->getCEP(),
                password_hash($user->getSenha(), PASSWORD_DEFAULT),
                $user->getIdUser()
            ]);

            return true;
        } catch (PDOException $e) {
            echo "Erro ao alterar: " . $e->getMessage();
            return false;
        }
    }

    public function excluirUser($iduser) {
        try {
            $sql = "DELETE FROM users WHERE iduser = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$iduser]);

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
            return false;
        }
    }

    public function buscarTodos() {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar usuários: " . $e->getMessage();
            return [];
        }
    }

    public function buscarPorCPF($cpf) {
        try {
            $sql = "SELECT * FROM users WHERE cpf = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$cpf]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar por CPF: " . $e->getMessage();
            return null;
        }
    }
}
?>
