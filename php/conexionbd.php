
<?php
 

	$conn=pg_connect("host=127.0.0.1 port=5432 dbname=bookstore user=booktique_admin password=b00ktique") or die (pg_last_error());
	$result = pg_query($conn, $query) or die (pg_last_error());






?>
