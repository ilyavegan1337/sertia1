<?php
require_once __DIR__ . '\Database.php';
$Database = new Database;
$qry = "DELETE FROM buy WHERE ID_Buy  = :id";
$parm = array(
    ":id" => $_GET["ID_Buy"]
);
$Database->set($qry, $parm);
header("Location: " . $_SERVER['HTTP_REFERER']);

