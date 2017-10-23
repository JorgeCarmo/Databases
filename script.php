<html>
	<body>
    <?php
	   $host = "db.ist.utl.pt";
      $user ="ist181149";
      $password = "111111";
      $dbname = $user;

      try {
	      $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      /* Codigo consulta / actualização */


	      $db = null;
	    }

	    catch (PDOException $e)
    	{
        echo("<p>ERROR: {$e->getMessage()}</p>");
    	}
    ?>
	</body>
</html>
