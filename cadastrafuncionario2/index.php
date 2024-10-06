<?php
session_start();
require 'conectar.php'; // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Validação no banco de dados
    //tabela usuarios e pegando os valores de usuario e senha
    //nesse caso precisei criar uma nova tabela no php
    $stmt = $bancobd->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->bind_param("ss", $usuario, $senha);//o ss e referente ao tipo das variaveis que e 2 string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['usuario'] = $usuario;
        header("Location: formulario.php"); // Redireciona para a tela de formulario
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <section id="menuDivido">
        <section id="formulario">
            <form method="POST" action="">
                <h2>Usuário:</h2>
                <input type="text" name="usuario" required>
                <h2>Senha:</h2>
                <input type="password" name="senha" required>
                <br>
                <input type="submit" value="Entrar" id="botaoenviar">
                <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
            </form>
        </section>
    </section>
</body>
</html>
