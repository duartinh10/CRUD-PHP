<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style3.css">
    <title>Document</title>
</head>
<body>
    <?php
    include_once("conectar.php");
    $index = "index.php";
    $nome = isset($_POST['Nome']) ? $_POST['Nome'] : "";
    $sobrenome = isset($_POST['Sobrenome']) ? $_POST['Sobrenome'] : "";
    $datafuncionario = isset($_POST['Datafuncionario']) ? $_POST['Datafuncionario'] : "";
    $email = isset($_POST['Email']) ? $_POST['Email'] : "";
    $telefone = isset($_POST['Telefone']) ? $_POST['Telefone'] : "";
    $endereco = isset($_POST['Endereco']) ? $_POST['Endereco'] : "";
    $profissao = isset($_POST['profissao']) ? $_POST['profissao'] : [];

    // Exibe os dados para verificação
    echo "<h1 id='titulo'>Verifique os dados antes de enviar:</h1>";
    echo "<section class='formulario'>";
    echo "<p>Nome: $nome</p>";
    echo "<p>Sobrenome: $sobrenome</p>";
    echo "<p>Data de Nascimento: $datafuncionario</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Telefone: $telefone</p>";
    echo "<p>Endereço: $endereco</p>";
    echo "<p>Profissões: " . implode(", ", $profissao) . "</p>";
    echo "</section>";

    // Formulário para confirmar o envio dos dados
    echo "<div class='formulario-botoes'>";
    echo "<form method='POST' action='cadastrar.php'>";
    echo "<input type='hidden' name='Nome' value='$nome'>";
    echo "<input type='hidden' name='Sobrenome' value='$sobrenome'>";
    echo "<input type='hidden' name='Datafuncionario' value='$datafuncionario'>";
    echo "<input type='hidden' name='Email' value='$email'>";
    echo "<input type='hidden' name='Telefone' value='$telefone'>";
    echo "<input type='hidden' name='Endereco' value='$endereco'>";
    echo "<input type='hidden' name='profissao' value='" . implode(",", $profissao) . "'>";
    echo "<input type='submit' value='Confirmar Cadastro' class='botao'>";
    echo "</form>";

    echo "<button class='botao' onclick=\"window.location.href='index.php'\">Ir para a página</button>";
    echo "</div>";
    ?>
</body>
</html>
