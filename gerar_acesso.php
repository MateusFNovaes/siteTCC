<!doctype HTML>
<?php
	
	//página simples que será anexada à area do professor, com a finalidade de criar os códigos (grupos).
	
	include "bd/conexao.php"
?>
<html>
<html>
	<title>página de cadastro</title>
	<meta charset="utf-8" lang="pt-br">
</html>
<body>

<form method="post" action="">
<input type="submit" name="gerar" value="Gerar">
<?php
	
if (ISSET($_POST['gerar'])){ 
	$codigo = substr (md5(time()),0,7);
	$sql="INSERT INTO `grupo` (`codGrupo`) VALUES ('$codigo')";
	mysqli_query($mysqli,$sql) or die (mysqli_error());
	echo "$codigo";}
else "";	
?>
</form>	
</body>
</html>