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
      try {
	      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      /* Codigo consulta / actualização */

	      $sql = "SELECT * FROM oferta WHERE codigo='" . $codigo . "' AND morada='" . $morada . "';";
    
        $result = $db->query($sql);
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");

        echo("<tr>\n");
        echo("<th>Data_Inicio</th>\n");
        echo("<th>Data_Fim</th>\n");
        echo("<th>Tarifa</th>\n");
        echo("</tr>\n");

        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['data_inicio']}</td>\n");
            echo("<td>{$row['data_fim']}</td>\n");
            echo("<td>{$row['tarifa']}</td>\n");
            echo("<td><a href=\"removeOffer.php?morada={$row['morada']}&codigo={$row['codigo']}&data_inicio={$row['data_inicio']}&data_fim={$row['data_fim']}&tarifa={$row['tarifa']}\">Remover Oferta</a></td>\n");
            echo("<td><a href=\"showReserva.php?morada={$morada}&codigo={$row['codigo']}&data_inicio={$row['data_inicio']}\">Ver Reservas</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");

        echo("<a href=\"addOffer1.php?morada={$morada}&codigo={$codigo}\">Adicionar oferta</a>\n");

	      $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>
