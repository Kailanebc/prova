<?php

			$data_inicio = $_POST['data_inicio'];
			$data_fim = $_POST['data_fim'];
      $nome = $_POST['nome'];
      $modelo = $_POST['modelo'];

      $mysqli = new mysqli("localhost", "root", "root", "car_leasing");
      $sql = "INSERT INTO `reservas`(`data_inicio`, `data_fim`, `id_usuario`, `carro_id`) VALUES ('".$data_inicio."', '".$data_fim."', '".$nome."','".$modelo."')";

      $mysqli->query($sql);

      header('Location: tabela_reservas.php');


?>