<?php
include_once("conectar.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se estiver no modo de atualização
    if (isset($_POST['update']) && $_POST['update'] == 1) {
        // Atualizar dados existentes
        if (isset($_POST['id'], $_POST['Nome'], $_POST['Sobrenome'], $_POST['Datafuncionario'], $_POST['Email'], $_POST['Telefone'], $_POST['Endereco'])) {
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            $nome = htmlspecialchars($_POST['Nome']);
            $sobrenome = htmlspecialchars($_POST['Sobrenome']);
            $datafuncionario = htmlspecialchars($_POST['Datafuncionario']);
            $email = htmlspecialchars($_POST['Email']);
            $telefone = htmlspecialchars($_POST['Telefone']);
            $endereco = htmlspecialchars($_POST['Endereco']);

            $sql = "UPDATE cadastrofuncionario SET Nome = ?, Sobrenome = ?, Datafuncionario = ?, Email = ?, Telefone = ?, Endereco = ? WHERE id = ?";
            $stmt = $bancobd->prepare($sql);
            $stmt->bind_param("ssssssi", $nome, $sobrenome, $datafuncionario, $email, $telefone, $endereco, $id);
            
            if ($stmt->execute()) {
                echo 'Dados atualizados com sucesso.';
            } else {
                die('Erro ao atualizar os dados.');
            }

            $stmt->close();
        } else {
            die('Dados incompletos.');
        }
    } else {
        // Inserir novos dados
        // ... (lógica de inserção)
    }
} else {
    die('Método inválido.');
}
?>
