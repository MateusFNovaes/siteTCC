<!doctype HTML>

<?php
	session_start();
	include "bd/conexao.php";
?>

<html>
<head>
<meta charset="utf-8" lang="pt-br">
<title>Área do professor</title>



</head>
<body>
<h1 align="center">Aqui vai ser a área do professor</h1>
<br><br>
<a href="aprovacao.php"><img src="img/square.png"/></a>



<?php    

//Verifica se há algum projeto esperando aprovação.
$resultado = mysqli_query($mysqli,"SELECT * FROM `aprovacao`");
$cont = mysqli_num_rows($resultado);

if ($cont !== 0) {
	
?>
<script type="text/javascript">

	document.write('Há projetos aguardando liberação');

</script>

<?php	
}
else echo "";
?>

</body>

</html>