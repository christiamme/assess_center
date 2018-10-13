<?php
//Importamos este archivo para jalar la misma conexión a la base de datos que el resto de la aplicación
require_once("../../../../includes/funciones.inc.php");

// include ('../../codebase/connector/db_sqlite3.php');
include ('../../codebase/connector/gantt_connector.php');
include ('../../codebase/connector/db_mysqli.php');

// SQLite
	// $dbtype = "SQLite3";
	// $res = new SQLite3(dirname(__FILE__)."/samples.sqlite");
	// $res->busyTimeout(1000);
	
// MySql
	// $dbtype = "MySQL";
	// $res=mysql_connect("localhost", "root", "C0t0delrey");
	// mysql_select_db("qerpdev");
	
// MySqli
	$dbtype = "MySQLi";	
	// $res = new mysqli("localhost", "root", "C0t0delrey","qerpdev"); 
	$res = $db;  //No definimos una nueva conexión, sino que copiamos la existente para no volverlo a definir
?>