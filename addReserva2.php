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
      $numero = $_REQUEST['numero'];
      $nif = $_REQUEST['nif'];
	  $estado = "Aceite";
	  $time_stamp = $_REQUEST['time_stamp'];


      try {
	      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      /* Codigo consulta / actualização */

	      $sql = "INSERT INTO reserva(`numero`) VALUES(:numero);";


	      $stmt = $db->prepare($sql);

	      $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
	      $stmt->execute();

		  $sql = "INSERT INTO estado(`numero`, `time_stamp`, `estado`) VALUES(:numero, :time_stamp, :estado);";
		  $stmt = $db->prepare($sql);
		  $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);		  
		  $stmt->bindParam(':time_stamp', $time_stamp, PDO::PARAM_STR);		  
		  $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
		  $stmt->execute();

	      $sql = "INSERT INTO aluga(`morada`, `codigo`, `data_inicio`, `nif`, `numero`) VALUES(:morada, :codigo, :data_inicio, :nif, :numero);";

	      $stmt = $db->prepare($sql);

	      $stmt->bindParam(':morada', $morada, PDO::PARAM_STR);
	      $stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
	      $stmt->bindParam(':data_inicio', $data_inicio, PDO::PARAM_STR);
	      $stmt->bindParam(':nif', $nif, PDO::PARAM_STR);
	      $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
	      $stmt->execute();
	      	
		  echo("New reserva created succesfully");
	      $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>