<?php

			$data_pagamento = $_POST['data_pagamento'];
			$valor = $_POST['valor'];
      $id_aluguel = $_POST['id_aluguel'];

      $mysqli = new mysqli("localhost", "root", "root", "car_leasing");
      $sql = "INSERT INTO `pagamentos`(`aluguel_id`, `valor`, `data`) VALUES ('".$id_aluguel."', '".$valor."', '".$data_pagamento."')";

      $mysqli->query($sql);

      header('Location: tabela_pagamentos.php');


?>