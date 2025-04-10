<?php
require_once '../db/Conexao.php';
require_once '../Model/PlanoModel.php';

class PlanoDAO {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function cadastrarPlano(PlanoModel $plano) {
        try {
            $sql = "INSERT INTO planos (nome, valor, beneficios) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $plano->getNome(),
                $plano->getValor(),
                $plano->getBeneficios()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar plano: " . $e->getMessage();
            return false;
        }
    }

    public function listarPlanos() {
        try {
            $sql = "SELECT * FROM planos";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar planos: " . $e->getMessage();
            return [];
        }
    }

    public function excluirPlano($idplano) {
        try {
            $sql = "DELETE FROM planos WHERE idplano = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$idplano]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir plano: " . $e->getMessage();
            return false;
        }
    }
}
?>
