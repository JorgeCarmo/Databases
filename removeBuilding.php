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

			  /* Codigo consulta / actualização */

				$sql = "DELETE FROM edificio WHERE `morada` = :morada";
				$stmt = $db->prepare($sql);
				echo("<p>$morada</p>");
				$stmt->bindParam(':morada', $morada, PDO::PARAM_STR);
				$stmt->execute();
				echo("Building removed succesfully");
				echo("<a href=\"showBuilding.php\">Voltar para pagina principal</a>");

				$db = null;
			}
			
			catch (PDOException $e)
			{
			echo("<p>ERROR: {$e->getMessage()}</p>");
			}
		?>
	</body>
</html>
