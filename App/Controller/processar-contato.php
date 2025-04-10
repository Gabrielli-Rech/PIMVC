<?php
require_once '../Controller/ContatoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $assunto = $_POST['assunto'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';
    $data_envio = $_data_envio['data_envio'] ?? '';

    $controller = new ContatoController();
    $sucesso = $controller->enviarMensagem($nome, $email, $assunto, $mensagem, $data_envio);

    if ($sucesso) {
        header('Location: ../View/index.html?msg=Mensagem enviada com sucesso');
    } else {
        header('Location: ../View/index.html?msg=Erro ao enviar mensagem');
    }
}
?>
