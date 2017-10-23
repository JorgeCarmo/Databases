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
	      $sql = "SELECT SUM(DATEDIFF(data_fim, data_inicio)*tarifa) as total FROM aluga NATURAL JOIN oferta GROUP BY codigo, morada HAVING morada='" . $morada . "' AND codigo='" . $codigo . "';";

	      $result = $db->query($sql);
			echo("<table border=\"0\" cellspacing=\"5\">\n");

        echo("<tr>\n");
        echo("<th>Codigo</th>\n");
        echo("</tr>\n");

        foreach($result as $row)
        {
            echo("<tr>\n");
            echo("<td>{$row['total']}</td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");
	      $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>