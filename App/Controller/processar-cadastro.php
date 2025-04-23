<?php
require_once '../Controller/UserController.php';

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        
        'nomeuser'       => $_POST['nomeuser'] ?? '',
        'cpf'            => $_POST['cpf'] ?? '',
        'email'          => $_POST['email'] ?? '',
        'telefone'       => $_POST['telefone'] ?? '',
        'dataNascimento' => $_POST['dataNascimento'] ?? '',
        'genero'         => $_POST['genero'] ?? '',
        'endereco'       => $_POST['endereco'] ?? '',
        'cidade'         => $_POST['cidade'] ?? '',
        'estado'         => $_POST['estado'] ?? '',
        'cep'            => $_POST['cep'] ?? '',
        'senha'          => $_POST['senha'] ?? '',
    ];

    $resultado = $controller->cadastraruser($dados);

    if (is_array($resultado) && isset($resultado['erro'])) {
        echo "Erro: " . $resultado['erro'];
    } else {
        echo "Usuário cadastrado com sucesso!";

}

}
?>
