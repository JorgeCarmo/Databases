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

      try {
	      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      /* Codigo consulta / actualização */

	      $sql = "SELECT * FROM aluga WHERE morada = '" . $morada . "' AND codigo = '" . $codigo ."' AND data_inicio = '" .$data_inicio . "';";
    
        $result = $db->query($sql);
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");

        echo("<tr>\n");
        echo("<th>Numero</th>\n");
		
		foreach($result as $row)
        {
			echo("<tr>\n");
			echo("<td>{$row['numero']}</td>\n");
			echo("<td><a href=\"addPaga1.php?morada={$morada}&codigo={$codigo}&data_inicio={$data_inicio}&numero={$row['numero']}\">Pagar Reserva</a></td>\n");
			echo("</tr>\n");
		}
        echo("</table>\n");

        echo("<a href=\"addReserva1.php?morada={$morada}&codigo={$codigo}&data_inicio={$data_inicio}\">Adicionar Reserva</a>\n");

	       $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>