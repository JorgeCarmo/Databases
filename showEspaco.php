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

      try {
	      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      /* Codigo consulta / actualizaÃ§Ã£o */
	      $sql = "SELECT * FROM espaco WHERE morada='" . $morada . "';";
		  $sql2 = "SELECT morada, codigo, SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as total FROM aluga NATURAL JOIN oferta GROUP BY codigo, morada HAVING morada='" . $morada . "';";
        $result = $db->query($sql);
		$result2 = $db->query($sql2);
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");

        echo("<tr>\n");        
		echo("<th>Morada</th>\n");
        echo("<th>Codigo</th>\n");
        echo("</tr>\n");

        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td>{$row['codigo']}</td>\n");
			echo("<td><a href=\"addOffer1.php?codigo={$row['codigo']}&morada={$row['morada']}\">Criar Oferta</a></td>\n");
			echo("<td><a href=\"showOffer.php?codigo={$row['codigo']}&morada={$row['morada']}\">Ver Ofertas</a></td>\n");
			echo("<td><a href=\"removeEspaco.php?codigo={$row['codigo']}\">Remover Espaco</a></td>\n");
			echo("<td><a href=\"showPost.php?codigo={$row['codigo']}&morada={$row['morada']}\">Ver Postos</a></td>\n");
            echo("<td><a href=\"showTotal.php?morada={$row['morada']}&codigo={$row['codigo']}\">Total</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");

        echo("<a href=\"addEspaco1.php?morada={$morada}\">Adicionar Espaco</a>\n");

	      $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>