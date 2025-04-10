<?php
require_once '../Model/CompraModel.php';
require_once '../DAO/CompraDAO.php';

class CompraController {
    public function registrarCompra($iduser, $idproduto, $data, $quantidade, $total, $frete) {
        $compra = new CompraModel();
        $compra->setIdUser($iduser);
        $compra->setIdProduto($idproduto);
        $compra->setDataCompra($data);
        $compra->setQuantidade($quantidade);
        $compra->setTotal($total);
        $compra->serFrete($frete);

        $dao = new CompraDAO();
        return $dao->registrarCompra($compra);
    }

    public function listarComprasDoUsuario($iduser) {
        $dao = new CompraDAO();
        return $dao->buscarComprasPorUsuario($iduser);
    }
}
?>
