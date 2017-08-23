<?php
session_start();
include "bd/conexao.php>";

if (!empty($_POST['usuario']) AND !empty($_POST['senha'])){


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$_SESSION['usuario'] = $usuario;

$resultado = mysqli_query($mysqli,"SELECT * FROM `aluno` WHERE `email` = '$usuario'");
$cont = mysqli_num_rows($resultado);

if( $cont !== 0 )
{
	$resultado = mysqli_query($mysqli,"SELECT * FROM `aluno` WHERE `email` = '$usuario' AND `senha`= '$senha'");
	$cont = mysqli_num_rows($resultado);
		if ($cont !== 0)
			{$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			header('location:index_aluno.php');
			$_SESSION['permissao'] = "1";
			
			}
		else {
			//unset ($_SESSION['usuario']);
			unset ($_SESSION['senha']);
			header('location:login.php');
			$_SESSION['verifica'] = "1";
	}
		
}

else {
		$resultado = mysqli_query($mysqli,"SELECT * FROM `professor` WHERE `email` = '$usuario'");
		$cont = mysqli_num_rows($resultado);

		if( $cont !== 0 )
				{


			$resultado = mysqli_query($mysqli,"SELECT * FROM `professor` WHERE `email` = '$usuario' AND `senha`= '$senha'");
			$cont = mysqli_num_rows($resultado);
			if ($cont !== 0)
				{$_SESSION['usuario'] = $usuario;
				$_SESSION['senha'] = $senha;
				header('location:index_professor.php');
				$_SESSION['permissao'] = "1";}
			else {
				//unset ($_SESSION['usuario']);
				unset ($_SESSION['senha']);
				header('location:login.php');
				$_SESSION['verifica'] = "1";
				
	}
		
}

		else {
			unset ($_SESSION['usuario']);
			unset ($_SESSION['senha']);
			header('location:login.php');
			$_SESSION['verifica'] = "2";
			
		}
	}
	
}
else {
	header('location:login.php');
	$_SESSION['verifica'] = "3";
	
}
?>