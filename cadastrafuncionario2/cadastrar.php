<?php
include_once("conectar.php");

$nome = $_POST['Nome'];
$sobrenome = $_POST['Sobrenome'];
$datafuncionario = $_POST['Datafuncionario'];
$email = $_POST['Email'];
$telefone = $_POST['Telefone'];
$endereco = $_POST['Endereco'];
$profissao = $_POST['profissao'];

$sql = "INSERT INTO cadastrofuncionario (Nome, Sobrenome, Datafuncionario, Email, Telefone, Endereco, Profissao) 
        VALUES ('$nome', '$sobrenome', '$datafuncionario', '$email', '$telefone', '$endereco', '$profissao')";

if (mysqli_query($bancobd, $sql)) {
    echo "Cliente cadastrado com sucesso!<br>";
} else {
    echo "Erro ao tentar cadastrar registro: " . mysqli_error($bancobd);
}

mysqli_close($bancobd);
header("Location: index.php");
?>
