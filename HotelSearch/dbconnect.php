<?php
@$dbcnx = new mysqli('localhost', 'root', '', 'user_management');
// @ to ignore error message display //
if ($dbcnx->connect_error){
	echo "Database is not online";
	exit;
	// above 2 statments same as die() //
	}
/*	else
	echo "Congratulations...  MySql is working..";
*/
?>
