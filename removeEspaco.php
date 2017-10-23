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
			$codigo = $_REQUEST['codigo'];

			try {
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			  /* Codigo consulta / actualização */

				$sql = "DELETE FROM espaco WHERE `codigo` = '" . $codigo . "';";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
				$stmt->execute();
				echo("Espaco removed succesfully");
				$db = null;
			}
			
			catch (PDOException $e)
			{
			echo("<p>ERROR: {$e->getMessage()}</p>");
			}
		?>
	</body>
</html>
