<?php
require_once 'Conexao.php';
require_once '../Model/ProdutoModel.php';

class ProdutoDAO {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function cadastrarProduto(ProdutoModel $produto) {
        try {
            $sql = "INSERT INTO produtos (nome, preco, descricao, frete) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $produto->getNome(),
                $produto->getPreco(),
                $produto->getDescricao(),
                $produto->getFrete()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar produto: " . $e->getMessage();
            return false;
        }
    }

    public function buscarTodos() {
        try {
            $sql = "SELECT * FROM produtos";
            return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar produtos: " . $e->getMessage();
            return [];
        }
    }
}
?>
