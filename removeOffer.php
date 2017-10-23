<html>
	<head>
		<meta charset="UTF-8" /> 
	</head>
	<body>
		<?php
			$host = "db.ist.utl.pt";
      $user ="ist181149";
      $password = "111111";
      $dbname = $user;

      $morada = $_REQUEST['morada'];
      $codigo = $_REQUEST['codigo'];
			$data_inicio = $_REQUEST['data_inicio'];
			$data_fim = $_REQUEST['data_fim'];
			$tarifa = $_REQUEST['tarifa'];

      try {
	      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      /* Codigo consulta / actualização */

	      $sql = "DELETE FROM oferta WHERE `morada` = :morada AND codigo = :codigo AND `data_inicio` = :data_inicio AND `data_fim` = :data_fim AND `tarifa` = :tarifa;";

	      $stmt = $db->prepare($sql);

	      $stmt->bindParam(':morada', $morada, PDO::PARAM_STR);
	      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
	      $stmt->bindParam(':data_inicio', $data_inicio, PDO::PARAM_STR);
	      $stmt->bindParam(':data_fim', $data_fim, PDO::PARAM_STR);
	      $stmt->bindParam(':tarifa', $tarifa, PDO::PARAM_STR);
	      $stmt->execute();


	      echo("Offer removed succesfully");
	      	

	      $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>
