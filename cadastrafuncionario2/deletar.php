<?php
include_once("conectar.php");//LEMBRAR DE INCLUIR O CODIGO DE CONEXÃO COM O BANCO DE DADOS
if (isset($_POST['id'])) {
    $id_para_deletar = $_POST['id'];

    // Validação básica para evitar SQL Injection
    $id_para_deletar = intval($id_para_deletar);

    // Query de deleção
    $sql = "DELETE FROM cadastrofuncionario WHERE id=$id_para_deletar";

    // Executar a query
    if (mysqli_query($bancobd, $sql)) {
        echo "Registro deletado com sucesso!";
        header("Location: index.php");
    } else {
        echo "Erro ao deletar o registro: " . mysqli_error($bancobd);
    }
} else {
    echo "ID não fornecido para deleção.";
}

// Fechar a conexão
mysqli_close($bancobd);
?>