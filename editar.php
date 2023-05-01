<?php
// Verifica se o ID do usuário foi passado na URL
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Conecta ao banco de dados e faz a consulta do usuário correspondente ao ID
	$sql = new mysqli('localhost', 'root', 'root', 'car_leasing');
	$consulta = $sql->query("SELECT * FROM usuarios WHERE id = $id");

	if ($consulta->num_rows == 1) {
		$linha = $consulta->fetch_assoc();

		// Verifica se o formulário foi submetido
		if (isset($_POST['submit'])) {
			// Atualiza os dados do usuário no banco de dados
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$email = $_POST['email'];
			$data_nascimento = $_POST['data_nascimento'];
			$tipo = $_POST['tipo'];

			$sql->query("UPDATE usuarios SET nome = '$nome', endereco = '$endereco', telefone = '$telefone', email = '$email', data_nascimento = '$data_nascimento', tipo = '$tipo' WHERE id = $id");

			// Redireciona de volta para a página de tabela_clientes
			header('Location: tabela_clientes');
			exit;
		}
	} else {
		// Se não houver um usuário correspondente ao ID, redireciona para a página de tabela_clientes
		header('Location: tabela_clientes');
		exit;
	}
} else {
	// Se o ID do usuário não foi passado na URL, redireciona para a página de tabela_clientes
	header('Location: tabela_clientes.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Editar Usuário</title>
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

		form {
			margin: 50px auto;
			padding: 20px;
			border: 1px solid #000;
			max-width: 500px;
			background-color: rgba(0, 0, 0, 0.5);
			box-shadow: 0px 0px 10px 0px #000;
			border-radius: 5px;
		}

		h1 {
			font-size: 50px;
			text-align: center;
			margin-bottom: 30px;
		}

		label {
			color: #fff;
			display: block;
			margin-bottom: 10px;
		}

		input, select {
			padding: 10px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 100%;
			box-sizing: border-box;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			background-color:  #007bff;
			color: white;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
			margin-top: 20px;
		}

		input[type="submit"]:hover {
			background-color: #007bff;
		}

		a {
      background-color:#007bff; 
      color: #fff;
      text-decoration: none;
      border: none;
			border-radius: 4px;
      cursor: pointer;
			font-size: 18px;
			padding: 10px;
			width: 100%;
			border: 1px solid #ccc;
    }
		
	</style>
</head>
<body>
	<h1>Editar Usuário</h1>
	<form method="post">
		<label for="nome">Nome:</label>
		<input type="text" id="nome" name="nome" value="<?php echo $linha['nome']; ?>">

		<label for="endereco">Endereço:</label>
		<input type="text" id="endereco" name="endereco" value="<?php echo $linha['endereco']; ?>">

		<label for="telefone">Telefone:</label>
		<input type="text" id="telefone" name="telefone" value="<?php echo $linha['telefone']; ?>">

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo $linha['email']; ?>">

		<label for="data_nascimento">Data Nascimento:</label>
		<input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $linha['data_nascimento']; ?>">

		<label for="tipo">Tipo de Usuário:</label>
		<select id="tipo" name="tipo">
			<option value="">Selecione</option>
			<option value="admin" <?php if ($linha['tipo'] == 'admin') echo 'selected'; ?>>Admin</option>
			<option value="cliente" <?php if ($linha['tipo'] == 'cliente') echo 'selected'; ?>>Cliente</option>
		</select>

		<input type="submit" name="submit" value="Atualizar">
		<br></br>
    <a href="tabela_clientes.php">
      Voltar
    </a>
	</form>
</body>
</html>
