<?php
require_once '../db/Conexao.php';
require_once '../Model/TreinoModel.php';

class TreinoDAO {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function cadastrarTreino(TreinoModel $treino) {
        try {
            $sql = "INSERT INTO treinos (iduser, nome, descricao, dias, tempo) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $treino->getIdUser(),
                $treino->getNome(),
                $treino->getDescricao(),
                $treino->getDias(),
                $treino->getTempo(),
                $treino->getTipo()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar treino: " . $e->getMessage();
            return false;
        }
    }

    public function listarTreinosDoUsuario($iduser) {
        try {
            $sql = "SELECT * FROM treinos WHERE iduser = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$iduser]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar treinos: " . $e->getMessage();
            return [];
        }
    }

    public function excluirTreino($idtreino) {
        try {
            $sql = "DELETE FROM treinos WHERE idtreino = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$idtreino]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir treino: " . $e->getMessage();
            return false;
        }
    }
}
?>
