<?php
require_once '../Model/ContatoModel.php';
require_once '../DAO/ContatoDAO.php';

class ContatoController {
    public function enviarMensagem($nome, $email, $assunto, $mensagem, $data_envio) {
        $contato = new ContatoModel();
        $contato->setNome($nome);
        $contato->setEmail($email);
        $contato->setAssunto($assunto);
        $contato->setMensagem($mensagem);
        $contato->setDataEnvio($data_envio);

        $dao = new ContatoDAO();
        return $dao->enviarMensagem($contato);
    }

    public function listarMensagens() {
        $dao = new ContatoDAO();
        return $dao->buscarMensagens();
    }
}
?>
