<?php
// Verifica se o ID do usuário foi passado na URL
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	// Conecta ao banco de dados e faz a consulta do usuário correspondente ao ID
	$sql = new mysqli('localhost', 'root', 'root', 'car_leasing');
	$consulta = $sql->query("SELECT c.modelo, c.ano, c.cor, c.placa, c.status, c.preco_dia, c.revisao, c.km_rodados, tc.nome 'tipo', c.id, tc.faixa_valor
				FROM carros c 
				INNER JOIN tipo_carro tc ON c.id_tipo_carro = tc.id where c.id = $id");

	if ($consulta->num_rows == 1) {
		$linha = $consulta->fetch_assoc();

		$tipo_carro = $sql->query("SELECT * FROM tipo_carro");

		if ($tipo_carro->num_rows == 1) {
			$tipo = $tipo_carro->fetch_assoc(); }

		// Verifica se o formulário foi submetido
		if (isset($_POST['submit'])) {
			// Atualiza os dados do usuário no banco de dados
			$modelo = $_POST['modelo'];
			$ano = $_POST['ano'];
			$cor = $_POST['cor'];
			$placa = $_POST['placa'];
			$status = $_POST['status'];
			$preco_dia = $_POST['preco_dia'];
			$revisao = $_POST['revisao'];
			$km_rodados = $_POST['km_rodados'];
			$tipo = $_POST['tipo'];

			$sql->query("UPDATE carros SET modelo = '$modelo', ano = '$ano', cor = '$cor', placa = '$placa', status = '$status', preco_dia = '$preco_dia' , 
			revisao = '$revisao', km_rodados = '$km_rodados' , id_tipo_carro = '$tipo' WHERE id = $id");

			// Redireciona de volta para a página de tabela_clientes
			header('Location: tabela_carros.php');
			exit;
		}
	} else {
		// Se não houver um usuário correspondente ao ID, redireciona para a página de tabela_clientes
		header('Location: tabela_carros.php');
		exit;
	}
} else {
	// Se o ID do usuário não foi passado na URL, redireciona para a página de tabela_clientes
	header('Location: tabela_carros.php');
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
	<h1>Editar Carros</h1>
	<form method="post">
		<label for="modelo">Modelo:</label>
		<input type="text" id="modelo" name="modelo" value="<?php echo $linha['modelo']; ?>">

		<label for="ano">Ano:</label>
		<input type="text" id="ano" name="ano" value="<?php echo $linha['ano']; ?>">

		<label for="cor">Cor:</label>
		<input type="text" id="cor" name="cor" value="<?php echo $linha['cor']; ?>">

		<label for="placa">Placa:</label>
		<input type="text" id="placa" name="placa" value="<?php echo $linha['placa']; ?>">

		<label for="status">Status:</label>
		<input type="text" id="status" name="status" value="<?php echo $linha['status']; ?>">

		<label for="preco_dia">Preço/Dia:</label>
		<input type="text" id="preco_dia" name="preco_dia" value="<?php echo $linha['preco_dia']; ?>">

		<label for="revisao">Revisao:</label>
		<input type="date" id="revisao" name="revisao" value="<?php echo $linha['revisao']; ?>">

		<label for="km_rodados">Km/Rodados:</label>
		<input type="text" id="km_rodados" name="km_rodados" value="<?php echo $linha['km_rodados']; ?>">

		<label for="tipo">Tipo de Carro:</label>
		<select name="tipo" id="tipo" required>
		<?php while ($tipo_carro_opcao = $tipo_carro->fetch_assoc()) { ?>
			<option value="<?php echo $tipo_carro_opcao['id']; ?>" <?php if ($linha['tipo'] == $tipo_carro_opcao['nome']) { echo "selected"; } ?>><?php echo $tipo_carro_opcao['nome']; ?></option>
		<?php } ?>
        </select>

		<input type="submit" name="submit" value="Atualizar">
		<br></br>
    <a href="tabela_carros.php">
      Voltar
    </a>
	</form>
</body>
</html>
