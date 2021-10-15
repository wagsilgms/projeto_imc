<style>
body {
	background-color: #777;
}
div, .valores {
	font-family: 'Verdana';
	height: 58px;
	line-height: 58px;
	font-size: 50px;
	font-weight: bold;
	text-align: center;
	padding: 0 0 5px 0;
	box-sizing: border-box;
}
.valores, .saida {
	border: none;
	font-size: 22px;
	line-height: 35px;
	box-shadow: none;
	text-align: left;
}
.saida {
	text-align: right;
}
.center {
	width: 35%;
	min-width: 480px;
	margin: 0 auto;
	margin-top: 100px;
}
.titulo {
	background-color: #000;
	color: #FFF;
	font-size: 32px;
	text-align: center;
	height: 60px;
	margin-bottom: 10px;
}
.nome {
	color: yellow;
	border: none;
	width: auto;
}
.sombra, .results, .titulo, button {
	box-shadow: 2px 2px 2px rgba(0,0,0,0.6);
}
.input {
	background-color: #EEE;
	color: #000;
	height: 40px;
	width: 100%;
	padding-left: 10px;
	font-size: 20px;
	margin-bottom: 20px;
}
.results {
	border: 1px solid black;
	padding: 10px;
	background-color: #FFF;
	font-size: 24px;
	display: flex;
	align-items: center;
	justify-content: center;
}
button {
	width: 100%;
	height: 40px;
	cursor: pointer;
}
.fio {
	height: 1px;
	width: 100%;
	border-top: 3px solid #000;
	margin: 20px 0 15px 0;
}
</style>

<?php

	if (isset($_POST['peso']) && (isset($_POST['altu']))) {
		$status = '';
		$nome = addslashes($_POST['nome']);
		$peso = str_replace(',', '.', $_POST['peso']);
		$altu = str_replace(',', '.', $_POST['altu']);
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Índice de Massa Corporal</title>
	</head>
	<body>
		<form method="POST" class="center">
			<div class="titulo">
				Índice de <span class="nome">Massa Corporal</span>
			</div>
			<div class="valores">
				Seu nome:
				<input type="text" name="nome" class="input"><br>
				Seu peso: 
				<input type="text" name="peso" class="input"><br>
				Sua altura: 
				<input type="text" name="altu" class="input">
				<button type="submit">Calcular</button>
				<br><br>
				<div class="saida">
					<?php
						if (!empty($peso) && !empty($altu)) {
							$vimc = $peso/($altu*$altu);
						} else {
							$vimc = '';
						}

						if ($vimc < 16) {
							$status = 'Baixo peso muito grave';
						} elseif ($vimc >= 16 && $vimc < 16.99) {
							$status = 'Baixo peso grave';
						} elseif ($vimc >= 17 && $vimc < 18.49) {
							$status = 'Baixo peso';
						} elseif ($vimc >= 18.50 && $vimc < 24.99) {
							$status = 'Peso normal';
						} elseif ($vimc >= 25 && $vimc < 29.99) {
							$status = 'Sobrepeso';
						} elseif ($vimc >= 30 && $vimc < 34.99) {
							$status = 'Obesidade grau I';
						} elseif ($vimc >= 35 && $vimc < 39.99) {
							$status = 'Obesidade grau II';
						} elseif ($vimc >= 40) {
							$status = 'Obesidade grau III';
						}

						if (!empty($nome) && !empty($peso) && !empty($altu) && !empty($vimc)) {
							echo "Olá, ".$nome."!<br><br>";
							echo "Seu IMC é: <span class='results'>".$vimc."</span><br>";
							echo "Seu status é:";
							echo "<br>";
							echo "<div class='results'>".$status."</div>";
						}
					?>
				</div>
			</div>
		</form>
	</body>
</html>