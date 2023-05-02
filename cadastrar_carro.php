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
	<h1>Cadastrar Carro</h1>
  <div>
	<form method="POST" action="carro_validacao-cadastro.php">
    <label for="modelo">Nome:</label>
    <input type="text" name="modelo" id="modelo" required placeholder="Digite o modelo do Carro"><br><br>
    <label for="ano">Ano:</label>
    <input type="text" name="ano" id="ano" required placeholder="Digite o Ano do carro"><br><br>
    <label for="cor">Cor:</label>
    <input type="text" name="cor" id="cor" required placeholder="Digite a Cor do carro"><br><br>
    <label for="placa">Placa:</label>
    <input type="text" name="placa" id="placa" required placeholder="Digite o numero da placa"><br><br>
    <label for="status">Status:</label>
    <select name="status" id="status">
			<option value="">Selecione</option>
			<option value="disponivel">disponivel</option>
			<option value="indisponivel">indisponivel</option>
		</select><br><br>
    <label for="preco_dia">Preco/dia:</label>
    <input type="text" name="preco_dia" id="preco_dia" required placeholder="Digite o Preço/dia"><br><br>
    <label for="revisao">Revisão:</label>
    <input type="date" name="revisao" id="revisao" required placeholder="Selecione a data da revisão"><br><br>
		<label for="km_rodados">km/Rodados:</label>
    <input type="text" name="km_rodados" id="km_rodados" required placeholder="Digite o km/Rodados do carro"><br><br>
		<label for="tipo">Selecione um tipo de carro:</label>
            <select id="tipo" name="tipo">
                <option value= 1 >Sedan</option>
                <option value= 2 >Hatch</option>
                <option value= 3 >SUV Viva</option>
                <option value= 4 >Picape</option>
                <option value= 5 >Esportivo</option>
                <option value= 6 >Compacto</option>
                <option value= 7 >Luxo</option>
                <option value= 8 >Utilitário</option>
                <option value= 9 >Van</option>
                <option value= 10 >Conversível</option>
            </select>
            <br></br>
		<input type="submit" value="Cadastrar">
    <br></br>
    <a href="tabela_carros.php">
      Voltar
    </a>
	</form>
  </div>
</body>
</html>