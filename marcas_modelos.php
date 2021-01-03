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
		<h1>Marcas / Modelos</h1>

		<?php
			if (isset($_GET["codigo"])) {
				$vcod=$_GET["codigo"];
				if ($vcod==1) {
					//Nova Marca
					$vmarca=$_GET["f_marca"];
					$sql="INSERT INTO tb_marcas (marca) VALUES ('$vmarca')";
					mysqli_query($con, $sql);
					$linhas=mysqli_affected_rows($con);
					if($linhas >= 1){
						echo "<script>alert('Nova marca adicionada com sucesso');</script>";
					} else {
						echo "<script>alert('ERRO ao adicionar nova marca');</script>";
					}
				} else if ($cod==2) {
					//Novo Modelo
					$vmodelo=$_GET["f_modelo"];
					$vidmarca=$_GET["f_marcas"];
					$sql="INSERT INTO tb_modelos (modelo,id_marca) VALUES ('$modelo', $vidmarca)";
					mysqli_query($con, $sql);
					$linhas=mysqli_affected_rows($con);
					if($linhas >= 1){
						echo "<script>alert('Novo modelo adicionado com sucesso');</script>";
					} else {
						echo "<script>alert('ERRO ao adicionar novo modelo');</script>";
					}
				} else if ($cod==3) {
					//Deleta Marca
				} else if($cod==4) {
					//Deleta Modelo
				}
			}
		?>

		<div id="f_add">
			<form name="f_nova_marca" action="marcas_modelos.php" method="get" class="">
				<input type="hidden" name="num" value="<?php $n1; ?>">
				<input type="hidden" name="codigo" value="1">
				<label>Nova Marca</label>
				<input type="text" name="f_marca" maxlength="50" size="50" required="required">
				<input type="submit" value="gravar marca" class="btmenu" name="f_bt_nova_marca">
			</form>

			<form name="f_novo_modelo" action="marcas_modelos.php" method="get" class="">
				<input type="hidden" name="num" value="<?php $n1; ?>">
				<input type="hidden" name="codigo" value="2">
				<label>Selecione uma Marca</label>
				<select name="f_marcas" size="10" required="required">
					<?php
						$sql = "SELECT * FROM tb_marcas";
						$col = mysqli_query($con, $sql);
						//$total_col = msqli_num_rows($col);
						while ($exibe=mysqli_fetch_array($col)) {
							echo "<option value='".$exibe['id_marca']."'>".$exibe['marca']."</option>";
						}
					?>
				</select>
				<label>Novo Modelo</label>
				<input type="text" name="f_modelo" maxlength="50" size="50" required="required">
				<input type="submit" value="gravar modelo" class="btmenu" name="f_bt_novo_modelo">
			</form>

		</div>

		<div id="f_del">
			
			<form name="f_del_marca" action="marcas_modelos.php" method="get" class="">
				<input type="hidden" name="num" value="<?php $n1; ?>">
				<input type="hidden" name="codigo" value="3">
				<label>Selecione uma Marca</label>
				<select name="f_marcas" size="10" required="required">
					<?php
						$sql = "SELECT * FROM tb_marcas";
						$col = mysqli_query($con, $sql);
						//$total_col = msqli_num_rows($col);
						while ($exibe=mysqli_fetch_array($col)) {
							echo "<option value='".$exibe['id_marca']."'>".$exibe['marca']."</option>";
						}
					?>
				</select>
				
				<input type="submit" value="deletar marca" class="btmenu" name="f_bt_del_marca">
			
			</form>

			<form name="f_del_modelo" action="marcas_modelos.php" method="get" class="">
				<input type="hidden" name="num" value="<?php $n1; ?>">
				<input type="hidden" name="codigo" value="4">
				<label>Selecione uma Modelo</label>
				<select name="f_marcas" size="10" required="required">
					<?php
						$sql = "SELECT * FROM tb_modelos";
						$col = mysqli_query($con, $sql);
						//$total_col = msqli_num_rows($col);
						while ($exibe=mysqli_fetch_array($col)) {
							echo "<option value='".$exibe['id_modelo']."'>".$exibe['modelo']."</option>";
						}
					?>
				</select>
				
				<input type="submit" value="deletar modelo" class="btmenu" name="f_bt_del_modelo">
			
			</form>			
		
		</div>		

	</section>

</body>
</html>