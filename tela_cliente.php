<!DOCTYPE html>
<html>
<head>
	<title>Tela do Cliente</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>

	body{
		background-color: #DCDCDC;
	}
	/* Definição de estilo para a tabela */
.table {
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
  border-collapse: collapse;
}

.table td,
.table th {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table th {
  font-weight: 700;
  background-color: #f8f9fa;
  border-top-width: 2px;
}

/* Estilo para a imagem dos carros */
.table img {
  max-width: 100px;
  height: auto;
}

/* Definição de estilo para o cabeçalho da página */
.navbar {
  background-color: #fff;
  border-bottom: 1px solid #e5e5e5;
}

.navbar-brand {
  font-size: 1.25rem;
}

/* Definição de estilo para o título principal */
h1 {
  margin-bottom: 1rem;
}

/* Definição de estilo para o texto de boas-vindas */
p {
  margin-bottom: 1rem;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="tela_cliente.php">Car Leasing</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="tela_cliente.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php">Sair</a>
			</li>
		</ul>
	</div>
</nav>


<div class="container-fluid mt-4 p-4">
	<div class="row">
		 <div class="col-md-12">
			<h1>Bem-vindo, a nossa loja</h1>
		 </div>
	</div>

	<div class="row mt-3">
  <div class="col-md-12">
    <h2>Lista de Carros</h2>
    <div class="card-deck">
      <?php
			$counter = 0; // initialize the variable before using it
      // Conectar ao banco de dados
      $conn = mysqli_connect("localhost", "root", "root", "car_leasing");

      // Verificar se a conexão foi bem sucedida
  if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
  }

  // Consultar o banco de dados para obter os carros disponíveis
  $sql = "SELECT * FROM carros WHERE status = 'disponivel' AND excluido = 0";
  $resultado = mysqli_query($conn, $sql);

  // Verificar se a consulta retornou algum resultado
  if (mysqli_num_rows($resultado) > 0) {
    // Loop para imprimir os dados de cada carro
    while ($row = mysqli_fetch_assoc($resultado)) {
      echo '<div class="card">';
      echo '<img class="card-img-top" src="' . $row["img"] . '" alt="Imagem do carro">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . $row["modelo"] . '</h5>';
      echo '<p class="card-text">Ano: ' . $row["ano"] . '</p>';
      echo '<p class="card-text">Cor: ' . $row["cor"] . '</p>';
      echo '<p class="card-text">Preço por dia: R$ ' . $row["preco_dia"] . '</p>';
      echo '</div>';
      echo '</div>';
      
      // Adiciona quebra de linha a cada 3 cartões exibidos
      if (($counter + 1) % 3 == 0) {
        echo '</div><div class="card-deck mt-3">';
      }
      $counter++;
    }
  } else {
    // Mensagem caso não haja carros disponíveis
    echo "<p>Não há carros disponíveis no momento.</p>";
  }

  // Encerrar a conexão com o banco de dados
  mysqli_close($conn);
  ?>
</div>
</div>
</div>
</body>
</html>
