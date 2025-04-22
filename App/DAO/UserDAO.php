<?php

class UserDAO {
    public function cadastrarUser(UserModel $user)
    {
        include_once 'Conexao.php';
        $conexao = new Conexao();
        $conn = $conexao->fazConexao(); // supondo que retorna PDO
    
        $sql = "INSERT INTO user
                (nomeuser, cpf, email, telefone, dataNascimento, genero, endereco, cidade, estado, cep, senha) 
                VALUES (:nome, :cpf, :email, :telefone, :dataNascimento, :genero, :endereco, :cidade, :estado, :cep, :senha)";
        
        $stmt = $conn->prepare($sql);
    
        $senhaHash = password_hash($aluno->getSenha(), PASSWORD_DEFAULT);
    
        $stmt->bindValue(':nome', $aluno->getNomeuser());
        $stmt->bindValue(':cpf', $aluno->getCpf());
        $stmt->bindValue(':email', $aluno->getEmail());
        $stmt->bindValue(':telefone', $aluno->getTelefone());
        $stmt->bindValue(':dataNascimento', $aluno->getDataNascimento());
        $stmt->bindValue(':genero', $aluno->getGenero());
        $stmt->bindValue(':endereco', $aluno->getEndereco());
        $stmt->bindValue(':cidade', $aluno->getCidade());
        $stmt->bindValue(':estado', $aluno->getEstado());
        $stmt->bindValue(':cep', $aluno->getCep());
        $stmt->bindValue(':senha', $senhaHash);
    
        $res = $stmt->execute();
    
        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso');</script>";
        } else {
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
