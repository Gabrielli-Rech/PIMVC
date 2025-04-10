<?php
require_once 'Conexao.php';
require_once '../Model/CompraModel.php';

class CompraDAO {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function registrarCompra(CompraModel $compra) {
        try {
            $sql = "INSERT INTO compras (iduser, idproduto, data_compra, quantidade, total, frete, quantidade) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $compra->getIdUser(),
                $compra->getIdProduto(),
                $compra->getDataCompra(),
                $compra->getQuantidade(),
                $compra->getTotal(),
                $compra->geetFrete(),
                $compra->getQuantidade()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao registrar compra: " . $e->getMessage();
            return false;
        }
    }

    public function buscarComprasPorUsuario($iduser) {
        try {
            $sql = "SELECT * FROM compras WHERE iduser = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$iduser]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar compras: " . $e->getMessage();
            return [];
        }
    }
}
?>
