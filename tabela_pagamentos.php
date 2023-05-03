<?php
    $mysqli = new mysqli ("localhost", "root", "root", "car_leasing");
        $sql = "SELECT pagamentos.data 'data_pagamento', alugueis.data_inicio, alugueis.data_fim, pagamentos.valor,
        carros.modelo, usuarios.nome, usuarios.data_nascimento
        FROM pagamentos
        INNER JOIN alugueis ON pagamentos.aluguel_id = alugueis.id
        INNER JOIN carros ON alugueis.carro_id = carros.id
        INNER JOIN usuarios ON alugueis.id_usuario = usuarios.id;";
        $pagamentos = $mysqli -> query($sql);
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
  margin: 0 auto;
  width: 90%;
  background-color: #fff;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  overflow: hidden;
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
		<h1>Gerenciamento de Pagamentos</h1>
	</header>
	<div>
		<a href="tela_admin.php">
			Voltar
		</a>
	</div>
	<div style="margin-top: 20px;">
  <table style="width: 90%; background-color: #fff; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); border-radius: 10px;">
    <thead>
      <tr>
        <th>Nome do Usuario</th>
        <th>Data de Nascimento</th>
        <th>Data de Pagamento</th>
        <th>Data de Locação</th>
        <th>Data de Devolução</th>
        <th>Modelo do Carro</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($linha = $pagamentos->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $linha['nome']; ?></td>
          <td><?php echo $linha['data_nascimento']; ?></td>
          <td><?php echo $linha['data_pagamento']; ?></td>
          <td><?php echo $linha['data_inicio']; ?></td>
          <td><?php echo $linha['data_fim']; ?></td>
          <td><?php echo $linha['modelo']; ?></td>
          <td><?php echo $linha['valor']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="tela_cadastrar-pagamentos.php" style="background-color: #333; color: #fff; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 20px; display: block; width: 80px; text-align: center;">Cadastrar</a>
</div>
</div>
</body>
