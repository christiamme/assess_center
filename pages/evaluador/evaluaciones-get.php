<?php

session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
require_once("../../resources/config_file.php");

if (isset($_SESSION['user']) && ($_SESSION['level'] == 1 || $_SESSION['level'] == 4)) {

    // Search in database

    // To protect MySQL injection, create parametrized query
    $listaClientes = $DB_connection -> prepare('SELECT vts_clientes.id, vts_clientes.nomcomercial, vts_clientes.razon_social, vts_clientes.tel1 FROM vts_clientes WHERE 1');

    // Execute query
    $listaClientes -> execute();

    // Unpack query content
    while ( $row = $listaClientes -> fetch() ) {
        $data[] = array(
          'id' => $row['id'],
          'nomcomercial' => utf8_encode($row['nomcomercial']),
          'razon_social' => utf8_encode($row['razon_social']),
          'tel1' => $row['tel1']
        );
    }

    //build the JSON array for return
    $json = array(
            $data
        );
    echo json_encode($json);

} else {
    header("location:../login/login.php");
}

?>
