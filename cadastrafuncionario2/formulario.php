<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./style.css">
  <title>Cadastro de Currículo</title>
  <script>
    function setFormAction(event) {
        var form = document.getElementById('formCadastro');
        var action = form.getAttribute('action');
        
        if (document.querySelector('input[name="update"]').value == 1) {
            form.action = 'atualizar.php';
        } else {
            form.action = 'verificarcadastro.php';
        }
    }
  </script>
</head>
<body>
  

  <section id="menuDivido">
    <section id="formulario">
    <h1>Cadastro de Currículo</h1>
      <form name="Cadastro" id="formCadastro" action="verificarcadastro.php" method="POST" class="form-cadastro">
        <input type="hidden" name="update" value="<?php echo isset($id) ? 1 : 0; ?>">
        <h2>ID:</h2>
        <input type="text" name="id" size="45" value="<?php echo isset($id) ? htmlspecialchars($id) : ''; ?>" readonly>
        <h2>Nome:</h2>
        <input type="text" name="Nome" size="45" value="<?php echo isset($nome) ? htmlspecialchars($nome) : ''; ?>">
        <h2>Sobrenome:</h2>
        <input type="text" name="Sobrenome" size="45" value="<?php echo isset($sobrenome) ? htmlspecialchars($sobrenome) : ''; ?>">
        <h2>Data de Nascimento:</h2>
        <input type="text" name="Datafuncionario" size="45" value="<?php echo isset($datafuncionario) ? htmlspecialchars($datafuncionario) : ''; ?>">
        <h2>Email:</h2>
        <input type="text" name="Email" size="45" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
        <h2>Telefone:</h2>
        <input type="text" name="Telefone" size="45" value="<?php echo isset($telefone) ? htmlspecialchars($telefone) : ''; ?>">
        <h2>Endereço:</h2>
        <input type="text" name="Endereco" size="45" value="<?php echo isset($endereco) ? htmlspecialchars($endereco) : ''; ?>">
        
        <h2>Preferência Profissional</h2>
        <?php
        $profissao = ["ADM", "TI", "RH", "JURIDICO", "TRANSPORTE", "SEGURANÇA"];
        foreach ($profissao as $value) { ?>
          <input type="checkbox" id="<?php echo $value; ?>" name="profissao[]" value="<?php echo $value; ?>" />
          <label for="<?php echo $value; ?>"><?php echo $value; ?></label><br>
        <?php } ?>
        
        <br>
        <input type="submit" name="enviar" value="<?php echo isset($id) ? 'Atualizar' : 'Cadastrar'; ?>" id="botaoenviar" onclick="setFormAction(event)">
      </form>
    </section>

    <section class="botoes-container">
    <form name="Deletar" action="deletar.php" method="POST">
        <h2>Deletar ID:</h2>
        <input type="text" name="id" size="10" value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : ''; ?>">
        <input type="submit" value="Excluir">
    </form>
    <form name="Preencher" action="preencher.php" method="POST">
        <h2>Preencher ID:</h2>
        <input type="text" name="id" size="10" value="<?php echo isset($_POST['id']) ? htmlspecialchars($_POST['id']) : ''; ?>">
        <input type="submit" value="Buscar">
    </form>
    <form name="Consultar" action="consultar.php" method="POST">
        <h2>Listar dados</h2>
        <input type="submit" name="consulta-completa" value="Consultar">
    </form>
</section>

  </section>
  <span><hr></span>
</body>
</html>
