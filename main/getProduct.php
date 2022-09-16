<?php
require_once __DIR__ . '\Database.php';
    $Database = new Database;
    $qry = "INSERT INTO `buy` (`ID_Customer`, `ID_Products`) VALUES (:id_cust, :id_prod)";
    $parm = array(
        ':id_prod' => trim($_GET['ID_Products']),
        ':id_cust' => trim($_SESSION['user_id']),
    );
    $Database->insertData($qry, $parm);
    header("Location: " . $_SERVER['HTTP_REFERER']);

