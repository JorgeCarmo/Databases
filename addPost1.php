<html>
	<head>
		<meta charset="UTF-8" /> 
	</head>
	<body>
		<h3> Type post information </h3>
		<form action="addPost2.php" method="post">
			<input type="hidden" name="morada" value=<?php echo $_REQUEST['morada']; ?>>
			<input type="hidden" name="codigo_espaco" value=<?php echo $_REQUEST['codigo']; ?>>
			<p>Codigo: <input type="text" name="codigo"/></p>
			<p>Foto: <input type="text" name="foto"/></p>
			<p><input type="submit" value="Submit"></p>
		</form>
	</body>
</html>