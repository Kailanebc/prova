<?php
			$modelo = $_POST['modelo'];
			$ano = $_POST['ano'];
			$cor = $_POST['cor'];
			$placa = $_POST['placa'];
			$status = $_POST['status'];
			$preco_dia = $_POST['preco_dia'];
			$revisao = $_POST['revisao'];
			$km_rodados = $_POST['km_rodados'];
			$id_tipo_carro = $_POST['tipo'];

      $mysqli = new mysqli("localhost", "root", "root", "car_leasing");
      $sql = "INSERT INTO `carros`(`modelo`, `ano`, `cor`, `placa`, `status`, `preco_dia`, `revisao`, `km_rodados`, `id_tipo_carro`) VALUES ('".$modelo."', '".$ano."', '".$cor."','".$placa."', '".$status."','".$preco_dia."', '".$revisao."' , '".$km_rodados."' , '".$id_tipo_carro."')";

      header('Location: tabela_carros.php');

      $mysqli->query($sql);

?>