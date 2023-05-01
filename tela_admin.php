<!DOCTYPE html>
<html>
<head>
	<title>Painel de Administração</title>
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

		a {
			color: #fff;
			text-decoration: none;
			font-size: 20px;
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

		nav {
			background-color: #666;
			color: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
		}

		nav ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
		}

		nav li {
			margin-right: 20px;
		}

		nav a {
			color: #fff;
			text-decoration: none;
			font-size: 1.2em;
			padding: 20px;
		}

		main {
			font-size: 45px;
			text-align: center;
			color: #fff;
			padding: 20px;
			background-size: 60px !important;
			background-color: rgba(0, 0, 0, 0.8);
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			margin: 0 auto;
			max-width: 1000px;
		}

		@media screen and (max-width: 768px) {
			h1 {
				font-size: 2em;
			}

			main {
				font-size: 30px;
			}

			nav a {
				font-size: 1em;
				padding: 10px;
			}

			nav li {
				margin-right: 10px;
			}

			nav {
				padding: 5px;
			}
		}
	</style>
</head>
<body>
	<header>
		<h1>Painel do Administrador</h1>
		<a href="index.php">Sair</a>
	</header>
	<nav>
		<ul>
			<li><a href="tela_cadastro-admin.php">Cadastrar</a></li>
			<li><a href="tabela_clientes.php">Clientes</a></li>
			<li><a href="#">Carros</a></li>
			<li><a href="#">Reservas</a></li>
			<li><a href="#">Pagamentos</a></li>
		</ul>
	</nav>
	<main>
		<p>Bem-vindo ao painel de Admin.</p>
	</main>
</body>
</html>

