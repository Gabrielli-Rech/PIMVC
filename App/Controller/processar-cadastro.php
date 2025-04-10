<?php
require_once '../Controller/UserController.php';

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $controller->cadastrar($_POST);

    if (is_array($resultado) && isset($resultado['erro'])) {
        echo "Erro: " . $resultado['erro'];
    } else {
        echo "Usuário cadastrado com sucesso!";
        // ou redirecionar com header("Location: sucesso.php");
    }
}
?>
