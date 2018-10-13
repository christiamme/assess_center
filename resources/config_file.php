<?php

// Host details
$host="localhost"; // Host name
$DB_user="root"; // Mysql username
$DB_password=""; // Mysql password
$DB_name="test"; // Database name

// Connect
try {
    $DB_connection = new PDO('mysql:host='.$host.';dbname='.$DB_name, $DB_user, $DB_password);
	$DB_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$DB_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "ERROR: " . $e->getMessage() . "<br/>";
    die();
}

?>
