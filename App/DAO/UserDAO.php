<?php

class UserDAO {
    public function cadastrarUser(UserModel $user) {
        include_once 'Conexao.php';
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
    
        $sql = "INSERT INTO user (nomeuser, cpf, email, telefone, dataNascimento, genero, endereco, cidade, estado, cep, senha) 
                VALUES (:nomeuser, :cpf, :email, :telefone, :dataNascimento, :genero, :endereco, :cidade, :estado, :cep, :senha)";
    
        $stmt = $conn->prepare($sql);
    
        $senhaHash = password_hash($user->getSenha(), PASSWORD_DEFAULT);
    
        $stmt->bindValue(':nomeuser', $user->getNomeuser());
        $stmt->bindValue(':cpf', $user->getCpf());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':telefone', $user->getTelefone());
        $stmt->bindValue(':dataNascimento', $user->getDataNascimento());
        $stmt->bindValue(':genero', $user->getGenero());
        $stmt->bindValue(':endereco', $user->getEndereco());
        $stmt->bindValue(':cidade', $user->getCidade());
        $stmt->bindValue(':estado', $user->getEstado());
        $stmt->bindValue(':cep', $user->getCep());
        $stmt->bindValue(':senha', $senhaHash);
        
        $res = $stmt->execute();
      
        if($res)
        {
            echo "<script>alert('Cadastro Realizado com sucesso');</script>";
        }
        else
            {
                echo "<script>alert('Erro: Não foi possível realizar o cadastro');</script>";
            }
        echo "<script>location.href='../controller/processaAluno.php?op=Listar';</script>";
    }

    public function alterarUser(UserModel $user) {
        try {
            $sql = "UPDATE users SET 
                nomeuser = ?, cpf = ?, email = ?, telefone = ?, dataNascimento = ?, genero = ?, 
                endereco = ?, cidade = ?, estado = ?, cep = ?, senha = ? 
                WHERE iduser = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $user->getiduser(),
                $user->getnomeuser(),
                $user->getcpf(),
                $user->getemail(),
                $user->gettelefone(),
                $user->getdataNascimento(),
                $user->getgenero(),
                $user->getendereco(),
                $user->getcidade(),
                $user->getestado(),
                $user->getcep(),
                password_hash($user->getsenha(), PASSWORD_DEFAULT)
                
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
