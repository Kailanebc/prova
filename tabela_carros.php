<?php
    $mysqli = new mysqli ("localhost", "root", "root", "car_leasing");
        $sql = "SELECT nome, endereco, telefone, email, data_nascimento, tipo
        FROM carros";
        $carros = $mysqli -> query($sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gerenciamento de Carros</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

		header {
			background-color: #333;
			color: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 20px;
		}

		h1 {
			font-size: 2.5em;
			margin: 0;
		}

		table {
		border-collapse: collapse;
		width: 90%;
		margin: auto;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		background-color: #fff;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
		border-radius: 10px;
		}

		th,
		td {
			text-align: left;
			padding: 12px;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		th {
			background-color: #333;
			color: #fff;
			font-size: 18px;
			border-radius: 10px 0 0 0;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		a {
			text-decoration: none;
			background-color: #333;
			color: #fff;
			padding: 8px 16px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
			margin-top: 20px;
		}

		button:hover {
			background-color: #555;
		}

		.alert {
			background-color: #f44336;
			color: #fff;
			padding: 8px;
			margin-top: 20px;
			display: none;
		}

		.alert.show {
			display: block;
		}
	</style>
</head>
<body>
	<header>
		<h1>Gerenciar Carros</h1>
	</header>
	<div>
		<a href="tela_admin.php">
			Voltar
		</a>
	</div>
	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Endereço</th>
        <th>Telefone</th>
				<th>Email</th>
				<th>Data Nascimento</th>
				<th>Tipo Usuario</th>
		</tr>
</thead>
<tbody>
			<?php
				while ($linha = $carros->fetch_assoc()){
				echo "<tr>";
				echo "<td>" . $linha['nome'] . "</td>";
				echo "<td>" . $linha['endereco'] . "</td>";
				echo "<td>" . $linha['telefone'] . "</td>";
				echo "<td>" . $linha['email'] . "</td>";
				echo "<td>" . $linha['data_nascimento'] . "</td>";
				echo "<td>" . $linha['tipo'] . "</td>";
				echo "</tr>";
				}
				?>
	</table>
</body>
