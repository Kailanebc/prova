<?php
    $mysqli = new mysqli ("localhost", "root", "root", "car_leasing");
        $sql = "SELECT r.* , u.nome, c.modelo 
        FROM reservas r INNER JOIN usuarios u ON r.id_usuario = u.id 
        INNER JOIN carros c ON r.carro_id = c.id WHERE r.excluido = 0;";
        $reservas = $mysqli -> query($sql);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gerenciamento de Reservas</title>
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
        <th>Data Locação</th>
        <th>Data Devolução</th>
        <th>Usuario</th>
        <th>Modelo</th>
        <th>Opção</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($linha = $reservas->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $linha['data_inicio']; ?></td>
          <td><?php echo $linha['data_fim']; ?></td>
          <td><?php echo $linha['nome']; ?></td>
          <td><?php echo $linha['modelo']; ?></td>
          <td>
            <a href="editar_reservas.php?id=<?php echo $linha['id']; ?>" style="color: white; text-decoration: none; padding: 5px 10px; border: 1px solid blue; border-radius: 5px; cursor: pointer;">Editar</a>
<!-- 
            <a href="excluir_reservas.php?id=<?php echo $linha['id']; ?>" style="color: white; text-decoration: none; padding: 5px 10px; border: 1px solid blue; border-radius: 5px; cursor: pointer;">Excluir</a> -->
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <!-- <a href="cadastrar_reserva.php" style="background-color: #333; color: #fff; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 20px; display: block; width: 80px; text-align: center;">Cadastrar</a> -->
</div>
</div>
</body>