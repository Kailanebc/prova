<?php
    $mysqli = new mysqli ("localhost", "root", "root", "car_leasing");
        $sql = "SELECT c.modelo, c.ano, c.cor, c.placa, c.status, c.preco_dia, c.revisao, c.km_rodados, tc.nome 'tipo', c.id, tc.faixa_valor
				FROM carros c 
				INNER JOIN tipo_carro tc ON c.id_tipo_carro = tc.id where excluido = 0";
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
		<h1>Gerenciamento de Carros</h1>
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
        <th>Modelo</th>
        <th>Ano</th>
        <th>Cor</th>
        <th>Placa</th>
        <th>Status</th>
        <th>Preço/Dia</th>
        <th>Revisão</th>
        <th>Km/Rodados</th>
        <th>Tipo de Carro</th>
        <th>Opção</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($linha = $carros->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $linha['modelo']; ?></td>
          <td><?php echo $linha['ano']; ?></td>
          <td><?php echo $linha['cor']; ?></td>
          <td><?php echo $linha['placa']; ?></td>
          <td><?php echo $linha['status']; ?></td>
          <td><?php echo $linha['preco_dia']; ?></td>
          <td><?php echo $linha['revisao']; ?></td>
          <td><?php echo $linha['km_rodados']; ?></td>
          <td><?php echo $linha['tipo']; ?></td>
          <td>
            <a href="editar_carros.php?id=<?php echo $linha['id']; ?>" style="color: white; text-decoration: none; padding: 5px 10px; border: 1px solid blue; border-radius: 5px; cursor: pointer;">Editar</a>

            <a href="excluir_carros.php?id=<?php echo $linha['id']; ?>" style="color: white; text-decoration: none; padding: 5px 10px; border: 1px solid blue; border-radius: 5px; cursor: pointer;">Excluir</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <a href="cadastrar_carro.php" style="background-color: #333; color: #fff; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 20px; display: block; width: 80px; text-align: center;">Cadastrar</a>
</div>
</div>
</body>
