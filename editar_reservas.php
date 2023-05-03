<?php
// Verifica se o ID da reserva foi passado na URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Conecta ao banco de dados e faz a consulta da reserva correspondente ao ID
  $sql = new mysqli('localhost', 'root', 'root', 'car_leasing');

  $consulta = $sql->query("SELECT r.*, u.nome, c.modelo 
                              FROM reservas r 
                              INNER JOIN usuarios u ON r.id_usuario = u.id 
                              INNER JOIN carros c ON r.carro_id = c.id
                              WHERE r.id = '$id'");

  if ($consulta && $consulta->num_rows == 1) {
    $linha = $consulta->fetch_assoc();

    // Verifica se o formulário foi submetido
    if (isset($_POST['submit'])) {
      // Atualiza os dados da reserva no banco de dados
      $data_inicio = $_POST['data_inicio'];
      $data_fim = $_POST['data_fim'];
      $nome = $_POST['nome'];
      $modelo = $_POST['modelo'];

      $sql->query("UPDATE reservas SET data_inicio = '$data_inicio', data_fim = '$data_fim', id_usuario = '$nome', carro_id = '$modelo' WHERE id = '$id'");

      // Redireciona de volta para a página de tabela_reservas
      header('Location: tabela_reservas.php');
      exit;
    }

    // Faz a consulta de usuários e carros para preencher as opções do formulário
      $usuarios = $sql->query("SELECT * FROM usuarios");
        $carros = $sql->query("SELECT * FROM carros");
      } else {
        echo "Reserva não encontrada.";}

  // Fecha a conexão com o banco de dados
  $sql->close();
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
	<h1>Editar Reservas</h1>
	<form method="post">
		<label for="data_inicio">Data Locação:</label>
		<input type="date" id="data_inicio" name="data_inicio" value="<?php echo $linha['data_inicio']; ?>">

		<label for="data_fim">Data Devolução:</label>
		<input type="date" id="data_fim" name="data_fim" value="<?php echo $linha['data_fim']; ?>">

    <label for="nome">Selecione o Usuário:</label>
<select name="nome" id="nome" required>
  <?php while ($row_usuario = $usuarios->fetch_assoc()) { ?>
    <option value="<?php echo $row_usuario['id']; ?>" 
		<?php if ($row_usuario['id'] == $linha['nome']) 
		{ echo "selected"; } ?>><?php echo $row_usuario['nome']; ?></option>
  <?php } ?>
</select>

<label for="modelo">Selecione o Modelo do Carro:</label>
<select name="modelo" id="modelo" required>
  <?php while ($row_carro = $carros->fetch_assoc()) { ?>
    <option value="<?php echo $row_carro['id']; ?>" 
		<?php if ($row_carro['id'] == $linha['modelo']) 
		{ echo "selected"; } ?>><?php echo $row_carro['modelo']; ?></option>
  <?php } ?>
</select>

		<input type="submit" name="submit" value="Atualizar">
		<br></br>
    <a href="tabela_reservas.php">
      Voltar
    </a>
	</form>
</body>
</html>