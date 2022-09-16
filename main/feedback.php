<?php
require_once __DIR__ . '\Database.php';
if (!empty($_POST['email'])) {
    $Database = new Database;
    $qry = "INSERT INTO `feedback` (`Email`) VALUES (:email)";
    $parm = array(
        ':email' => trim($_POST['email']),
    );
    $Database->insertData($qry, $parm);
    header('Location: index.php');
}
?>
