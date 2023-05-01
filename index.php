<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Aluguel de Carros</title>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    </head>
<body>
    <div class="container">
      <div class="login-box">
      <h2>Login</h2>
      <?php
          if((isset($_POST['username']))){
            $nome = $_POST['username'];
          }else{
            $nome = "";
          }
          if (isset($_POST['password'])){
            $senha = $_POST['password'];
          }else{
            $senha = "";
        	}
      ?>
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="username">Nome de usuário</label>
            <input type="text" id="username" name="username" required
            placeholder="Digite seu nome de usuário" value="<?= $nome ?>">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required 
            placeholder="Digite sua senha" value="<?= $senha ?>">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
              Entrar
            </button>
            <br></br>
            <button type="submit" class="btn btn-primary btn-block" onclick="window.location.href='tela_cadastro-cliente.php'">
              Cadastrar
            </button>
            <!-- Na página index.php, você pode exibir a mensagem de erro caso exista: -->
            <?php
              if(isset($_GET['erro'])){
                $erro = $_GET['erro'];
                echo '<p style="color: red;">' . $erro . '</p>';
            }
            ?>
              <br>
			      </br>
          </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>