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

      try {
	      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      /* Codigo consulta / actualização */

	      $sql = "SELECT * FROM edificio;";
		
		$result = $db->query($sql);
    
        echo("<table border=\"0\" cellspacing=\"5\">\n");

        echo("<tr>\n");
        echo("<th>Morada</th>\n");
        echo("</tr>\n");

        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['morada']}</td>\n");
            echo("<td><a href=\"removeBuilding.php?morada={$row['morada']}\">Remover Edificio</a></td>\n");
			echo("<td><a href=\"showEspaco.php?morada={$row['morada']}\">Ver Espacos</a></td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");

        echo("<a href=\"addBuilding1.php?\">Adicionar Edificio</a>\n");

	      $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>
