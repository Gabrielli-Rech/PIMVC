<?php
require_once 'Conexao.php';
require_once '../Model/ContatoModel.php';

class ContatoDAO {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function enviarMensagem(ContatoModel $contato) {
        try {
            $sql = "INSERT INTO contatos (nome, email, assunto, mensagem, data_envio) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                $contato->getNome(),
                $contato->getEmail(),
                $contato->getAssunto(),
                $contato->getMensagem(),
                $contato->getDataEnvio()
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erro ao enviar mensagem: " . $e->getMessage();
            return false;
        }
    }

    public function buscarMensagens() {
        try {
            $sql = "SELECT * FROM contatos";
            return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar mensagens: " . $e->getMessage();
            return [];
        }
    }
}
?>
