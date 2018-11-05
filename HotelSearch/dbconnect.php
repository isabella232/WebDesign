<?php
@$dbcnx = new mysqli('localhost', 'root', '', 'hotel_search_db');
// @ to ignore error message display //
if ($dbcnx->connect_error){
	echo "Database is not online";
	exit;
}
?>
