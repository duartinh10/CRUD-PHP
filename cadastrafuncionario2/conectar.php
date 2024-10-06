<?php
		
/* Dados do Banco de Dados a conectar */
$Servidor = 'localhost';
$Usuario = 'root';
$Senha = '';
$nomeBanco = 'cadastro';
$bancobd = mysqli_connect($Servidor, $Usuario, $Senha, $nomeBanco);


if (!$bancobd) {
	die('Não foi possível conectar ao Banco de Dados');
   }

?>