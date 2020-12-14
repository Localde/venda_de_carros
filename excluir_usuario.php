<?php
	session_start();
	if(isset($_SESSION["numlogin"])){
		$n1=$_GET["num"];
		$n2=$_SESSION["numlogin"];
		if($n1!=$n2){
			echo "<p>Login não efetuado</p>";
			exit;
		}
	}else{
		echo "<p>Login não efetuado</p>";
		exit;
	}
	include "conexao.inc";
?>
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
		<a href="gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">voltar</a>
		<h1>Excluir Usuário</h1>

		<?php

			if(isset($_GET["f_bt_excluir_colaborador"])) {
				$vid=$_GET["f_colaboradores"];
			}

		?>

		<form name="f_excluir_colaborador" action="excluir_usuario.php" class="f_colaborador" method="GET">
			<input type="hidden" name="num" value="<?php echo $n1; ?>">
			<label>Selecione o Colaborador</label>
			<select name="f_colaboradores" size="10">
				<option value="id_col">nome_col</option>
			</select>
			<input type="submit" name="f_bt_excluir_colaborador" class="btmenu" value="excluir">
		</form>	

	</section>

</body>
</html>