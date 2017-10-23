<html>
	<head>
		<meta charset="UTF-8" /> 
	</head>
	<body>
		<h3> Type payment information </h3>
		<form action="addPaga2.php" method="post">
			<p>data de pagamento: <input type="text" name="data"/></p>
			<p>metodo: <input type="text" name="metodo"/></p>
			<p>codigo de transacao: <input type="text" name="codigo_de_transacao"/></p>
			<input type="hidden" name="numero" value=<?php echo $_REQUEST['numero']; ?>>
			<p><input type="submit" value="Submit"></p>
		</form>
	</body>
</html>