<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Funcionários</title>
    <!-- Inclua o arquivo CSS -->
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <form method="POST" action="" id="filtragem">
        <p for="nome">Filtrar por Nome:</p>
        <input type="text" id="nome" name="nome" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>">
        
        <p for="email">Filtrar por Email:</p>
        <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        
        <input type="submit" value="Filtrar" id="btnenviar">
    </form>

    <?php
    // Conecta ao banco de dados
    include_once("conectar.php");

    // Obtemos os filtros do formulário, se existirem
    $nomeFiltro = isset($_POST['nome']) ? mysqli_real_escape_string($bancobd, $_POST['nome']) : '';
    $emailFiltro = isset($_POST['email']) ? mysqli_real_escape_string($bancobd, $_POST['email']) : '';

    // Criamos a consulta SQL com base nos filtros fornecidos
    $sql = "SELECT * FROM cadastrofuncionario WHERE 1=1";

    if ($nomeFiltro) {
        $sql .= " AND Nome LIKE '%$nomeFiltro%'";
    }

    if ($emailFiltro) {
        $sql .= " AND Email LIKE '%$emailFiltro%'";
    }

    $resultado = mysqli_query($bancobd, $sql) or die("Erro ao retornar dados");

    // Criamos a tabela para exibir os resultados
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>NOME</th>";
    echo "<th>SOBRENOME</th>";
    echo "<th>Data de Nascimento</th>";
    echo "<th>Email</th>";
    echo "<th>Telefone</th>";
    echo "<th>Endereço</th>";
    echo "<th>Profissão</th>";
    echo "</tr>";

    while ($registro = mysqli_fetch_array($resultado)) {
        $id = $registro['id'];
        $nome = $registro['Nome'];
        $sobrenome = $registro['Sobrenome'];
        $datafuncionario = $registro['Datafuncionario'];
        $email = $registro['Email'];
        $telefone = $registro['Telefone'];
        $endereco = $registro['Endereco'];
        $profissao = $registro['profissao'];
        echo "<tr>";
        echo "<td>".$id."</td>";
        echo "<td>".$nome."</td>";
        echo "<td>".$sobrenome."</td>";
        echo "<td>".$datafuncionario."</td>";
        echo "<td>".$email."</td>";
        echo "<td>".$telefone."</td>";
        echo "<td>".$endereco."</td>";
        echo "<td>".$profissao."</td>";
        echo "</tr>";
    }
    
    mysqli_close($bancobd);
    echo "</table>";
    ?>
</body>
</html>
