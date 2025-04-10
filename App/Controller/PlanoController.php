<?php
require_once '../Model/PlanoModel.php';
require_once '../DAO/PlanoDAO.php';

class PlanoController {
    public function cadastrarPlano($nome, $valor, $beneficios) {
        $plano = new PlanoModel();
        $plano->setNome($nome);
        $plano->setValor($valor);
        $plano->setBeneficios($beneficios);

        $dao = new PlanoDAO();
        return $dao->cadastrarPlano($plano);
    }

    public function listarPlanos() {
        $dao = new PlanoDAO();
        return $dao->buscarTodos();
    }
}
?>
