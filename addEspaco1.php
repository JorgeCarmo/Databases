<html>
	<head>
		<meta charset="UTF-8" /> 
	</head>
	<body>
		<h3> Type space information </h3>
		<form action="addEspaco2.php" method="post">
			<input type="hidden" name="morada" value=<?php echo $_REQUEST['morada']; ?>>
			<p>Codigo: <input type="text" name="codigo"/></p>
			<p>Foto: <input type="text" name="foto"/></p>
			<p><input type="submit" value="Submit"></p>
		</form>
	</body>
</html>