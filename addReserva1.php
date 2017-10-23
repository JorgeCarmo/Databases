<html>
	<head>
		<meta charset="UTF-8" /> 
	</head>
	<body>
		<h3> Escreva a informação da Reserva </h3>
		<form action="addReserva2.php" method="post">
			<p>Numero: <input type="text" name="numero"/></p>
			<p>Nif: <input type="text" name="nif"/></p>
			<p>Time_stamp: <input type="text" name="time_stamp"/></p>
			<input type="hidden" name="morada" value=<?php echo $_REQUEST['morada']; ?>>
			<input type="hidden" name="codigo" value=<?php echo $_REQUEST['codigo']; ?>>
			<input type="hidden" name="data_inicio" value=<?php echo $_REQUEST['data_inicio']; ?>>
			<p><input type="submit" value="Submit"></p>
		</form>
	</body>
</html>	