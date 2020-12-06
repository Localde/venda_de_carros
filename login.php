<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Itaipú Veiculos</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="estilos.css"/>
</head>
<body>

	<header>
		<?php
			include "topo.php";
		?>
	</header>

	<section id="main">
		<?php
			if(isset($_POST["f_logar"])){
				$user=$_POST["f_user"];
				$senha=$_POST["f_senha"];

				//MySQL
					//PESQ. USER, SE EXISTIR
					//OBTER USER E SENHA
					//COMP. SENHA


				if(($user!="bruno") or ($senha!="123")) {
					echo "<p id='lgErro'>Login incorreto</p>";
				} else {
					$chave1="abcdefghijklmnopqrstuvwxyz";
					$chave2="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					$chave3="0123456789";
					$chave=str_shuffle($chave1.$chave2.$chave3);
					$tam=strlen($chave);
					$num="";
					$qtde=rand(20,50);
					for($i=0;$i<$qtde;$i++){
						$pos=rand(0,$tam);
						$num.=substr($chave, $pos, 1);
					}
					session_start();
					$_SESSION['numlogin']=$num;
					$_SESSION['username']=$user;
					header("Location:gerenciamento.php?num=$num");
				}
			}
		?>
		<form action="login.php" method="post" name="f_login" id="f_login">
			<label>Usuário</label>
			<input type="text" name="f_user">
			<label>Senha</label>
			<input type="password" name="f_senha">
			<input type="submit" value="LOGAR" name="f_logar">
		</form>
	</section>

	<footer id="rodape">
		<?php
			include "rodape.html";
		?>
	</footer>