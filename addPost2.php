<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php
			$host = "db.ist.utl.pt";
			$user = "ist181149";
			$password = "111111";
			$dbname = $user;
			$morada = $_REQUEST['morada'];
			$codigo = $_REQUEST['codigo'];
			$codigo_espaco = $_REQUEST['codigo_espaco'];
			$foto = $_REQUEST['foto'];

			try {
				$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			  /* Codigo consulta / actualização */

				$sql = "INSERT INTO alugavel(`morada`, `codigo`, `foto`) VALUES(:morada, :codigo, :foto);";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':morada', $morada, PDO::PARAM_STR);
				$stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
				$stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
				$stmt->execute();
				$sql = "INSERT INTO posto(`morada`, `codigo`, `codigo_espaco`) VALUES(:morada, :codigo, :codigo_espaco);";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':morada', $morada, PDO::PARAM_STR);
				$stmt->bindParam(':codigo', $codigo, PDO::PARAM_STR);
				$stmt->bindParam(':codigo_espaco', $codigo_espaco, PDO::PARAM_STR);
				$stmt->execute();
				echo("New post created succesfully\n");
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
