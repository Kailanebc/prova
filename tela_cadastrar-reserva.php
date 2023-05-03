<?php

$sql = new mysqli('localhost', 'root', 'root', 'car_leasing');

$modelo_carro = $sql->query("SELECT * FROM carros WHERE excluido = 0;");
$usuarios = $sql->query("SELECT * FROM usuarios WHERE excluido = 0;");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<style>
		body {
      background-image: url("https://quatrorodas.abril.com.br/wp-content/uploads/2020/03/renault-city_k-ze-2020-1600-02.jpg-e1585150040984.jpg?quality=70&strip=info&w=1280&h=720&crop=1");
      background-size: cover;
			font-family: Arial, sans-serif;
		}

		h1 {
			color: #000;
      font-weight: 700;
      font-size: 50px;
			margin-bottom: 20px;
			text-align: center;
		}

		form {
			background-color: rgba(0, 0, 0, 0.8);
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			margin: 0 auto;
			max-width: 500px;
			padding: 20px;
		}

		label {
			color: #fff;
			display: block;
			font-size: 18px;
			margin-bottom: 10px;
		}

		input[type="text"],
		input[type="date"],
		input[type="email"],
		input[type="password"],
		select {
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			padding: 10px;
			width: 450px;
		}

		input[type="submit"]{
			background-color:#007bff;
			border: none;
			border-radius: 4px;
			color: #fff;
			border: 1px solid #ccc;
			cursor: pointer;
			font-size: 18px;
			padding: 10px;
			width: 100%;
		}

		input[type="submit"]:hover {
			background-color:#007bff;
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
	<h1>Cadastrar Reserva</h1>
  <div>
	<form method="POST" action="cadastrar_reserva.php">
    <label for="data_inicio">Data da Locação:</label>
    <input type="date" name="data_inicio" id="data_inicio" required><br><br>
    <label for="data_fim">Data da Devolução:</label>
    <input type="date" name="data_fim" id="data_fim" required><br><br>
    <label for="nome">Usuario:</label>
		<select name="nome" id="nome" required>
		<?php while ($usuario = $usuarios->fetch_assoc()) { ?>
			<option value="<?php echo $usuario['id']; ?>"> <?php echo $usuario['nome']; ?></option>
		<?php } ?>
        </select>
		<br><br>


    <label for="modelo">Nome do Carro:</label>
		<select name="modelo" id="modelo" required>
		<?php while ($modelo_carro_opcao = $modelo_carro->fetch_assoc()) { ?>
			<option value="<?php echo $modelo_carro_opcao['id']; ?>"> <?php echo $modelo_carro_opcao['modelo']; ?></option>
		<?php } ?>
        </select>
		<br><br>  
		<input type="submit" name="submit" value="Cadastrar">
		<br></br>
    <a href="tabela_reservas.php">
      Voltar
    </a>
	</form>
  </div>
</body>
</html>