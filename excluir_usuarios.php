<?php
// Verifica se o ID do usuário foi passado na URL
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Conecta ao banco de dados e faz a consulta do usuário correspondente ao ID
	$sql = new mysqli('localhost', 'root', 'root', 'car_leasing');
	$consulta = $sql->query("SELECT * FROM usuarios WHERE id = $id");

	if ($consulta->num_rows == 1) {
		$linha = $consulta->fetch_assoc();

		if (isset($_POST['confirmarExclusao'])) {
			// Exclui o usuário do banco de dados
			$sql->query("UPDATE usuarios SET excluido = 1 WHERE id = $id");
			header("Location: tabela_usuarios.php");
			exit();
		}
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Excluir Usuário</title>
	<style>
		body {
			background-image: url("https://quatrorodas.abril.com.br/wp-content/uploads/2020/03/renault-city_k-ze-2020-1600-02.jpg-e1585150040984.jpg?quality=70&strip=info&w=1280&h=720&crop=1");
			background-size: cover;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}
		h1 {
      font-size: 50px;
			margin-top: 30px;
			text-align: center;
			color: #000;
		}
		form {
			margin: 30px auto;
			padding: 20px;
			width: 400px;
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
		}
		p {
			margin-bottom: 20px;
			color: #333;
			font-size: 18px;
		}
		input[type="submit"], button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 18px;
			cursor: pointer;
			margin-right: 10px;
		}
		button {
			background-color: #007bff;
		}
		input[type="submit"]:hover, button:hover {
			background-color: #007bff;
		}
	</style>
</head>
<body>
	<h1>Excluir Usuário</h1>
	<form method="post">
		<p>Você tem certeza que deseja excluir o usuário <strong><?php echo $linha['nome']; ?></strong>?</p>
		<input type="submit" name="confirmarExclusao" value="Sim">
		<button type="button" onclick="window.location.href='tabela_usuarios.php'">Não</button>
	</form>
</body>
</html>

