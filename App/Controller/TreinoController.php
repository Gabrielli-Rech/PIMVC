<?php
require_once '../Model/TreinoModel.php';
require_once '../DAO/TreinoDAO.php';

class TreinoController {
    public function cadastrarTreino($nome, $tipo, $descricao, $tempo) {
        $treino = new TreinoModel();
        $treino->setNome($nome);
        $treino->setTipo($tipo);
        $treino->setDescricao($descricao);
        $treino->setTempo($tempo);
        $treino->setDias($dias);

        $dao = new TreinoDAO();
        return $dao->cadastrarTreino($treino);
    }

    public function listarTreinos() {
        $dao = new TreinoDAO();
        return $dao->buscarTodos();
    }
}
?>
