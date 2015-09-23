<?php

include("classes/mysql.class.php");

$mySQL = new MySQL;
$rsClientes = $mySQL->executeQuery("SELECT * FROM loja;");
$rsClientes_totalRows = mysql_num_rows($rsClientes);

?>
