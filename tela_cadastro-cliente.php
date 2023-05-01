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
	<h1>Cadastro</h1>
	<form method="POST" action="validacao_cadastro-cliente.php">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required placeholder="Digite seu nome"><br><br>
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" id="endereco" required placeholder="Digite seu Endereço"><br><br>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" id="telefone" required placeholder="Digite seu Telefone"><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required placeholder="Digite seu email"><br><br>
    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" name="data_nascimento" id="data_nascimento" required placeholder="Digite sua Data de Nascimento"><br><br>
    <label for="senha">Senha:</label>
    <input type="password" name="password" id="password" required placeholder="Digite sua senha"><br><br>
    <label for="password_repeat">Confirme a senha:</label>
    <input type="password" name="password_repeat" id="password_repeat" required placeholder="Digite sua senha novamente"><br><br>
		<label for="tipo">Descrição:</label>
		<select name="tipo" id="tipo">
			<option value="">Selecione</option>
			<option value="cliente">Cliente</option>
		</select><br><br>
		<input type="submit" value="Cadastrar">
    <br></br>
    <a href="index.php">
      Voltar
    </a>
		<?php
			if(isset($_GET['erro'])){
				$erro = $_GET['erro'];
				echo '<p style="color: red;">' . $erro . '</p>';
		}
		?>
	</form>
</body>
</html>
