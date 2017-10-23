<html>
	<head>
		<meta charset="UTF-8" /> 
	</head>
	<body>
		<h3> Type offer information </h3>
		<form action="addOffer2.php" method="post">
			<input type="hidden" name="morada" value=<?php echo $_REQUEST["morada"]; ?>>
			<input type="hidden" name="codigo" value=<?php echo $_REQUEST["codigo"]; ?>>
			<p>Data de inicio: <input type="text" name="data_inicio"/></p>
			<p>Data de fim: <input type="text" name="data_fim"/></p>
			<p>Tarifa: <input type="text" name="tarifa"/></p>
			<p><input type="submit" value="Submit"></p>
		</form>
	</body>
</html>