<html>
    <body>
<?php
    $data = $_REQUEST['data'];
    $metodo = $_REQUEST['metodo'];
    $numero = $_REQUEST['numero'];
    $codigo_de_transacao = $_REQUEST['codigo_de_transacao'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist181149";
        $password = "111111";
        $dbname = $user;
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "INSERT INTO estado(`numero`, `time_stamp`, estado`) VALUES(:numero, :time_stamp, :estado);";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
		$stmt->bindParam(':time_stamp', $data, PDO::PARAM_STR);
		$stmt->bindParam(':estado', "Paga", PDO::PARAM_STR);
		$stmt->execute();		

        $sql = "INSERT INTO paga(`numero`, `data`, `metodo`) VALUES(:numero, :data, :metodo);";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);
        $stmt->bindParam(':metodo', $metodo, PDO::PARAM_STR);
        $stmt->execute();
		
		echo("Payment successful");
        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    </body>
</html>
