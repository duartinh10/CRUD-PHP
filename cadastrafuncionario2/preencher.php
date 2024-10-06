<?php
include("conectar.php");

$nome = '';
$sobrenome = '';
$datafuncionario = '';
$email = '';
$telefone = '';
$endereco = '';
$erro = '';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "SELECT id, Nome, Sobrenome, Datafuncionario, Email, Telefone, Endereco FROM cadastrofuncionario WHERE id=$id";
    $result = mysqli_query($bancobd, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $nome = $row['Nome'];
        $sobrenome = $row['Sobrenome'];
        $datafuncionario = $row['Datafuncionario'];
        $email = $row['Email'];
        $telefone = $row['Telefone'];
        $endereco = $row['Endereco'];

        include("index.php");
    } else {
        $erro = "Cliente não encontrado.";
    }
} else {
    die('ID não fornecido.');
}

mysqli_close($bancobd);
?>
