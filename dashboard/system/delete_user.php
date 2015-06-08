<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();
$users = $SQLCon->SQLGetUsers();

if ($users->num_rows > 1) {
    $id = htmlspecialchars($_GET["user"]);
    $sql = "DELETE FROM afgor_users WHERE id=$id";

    if (!mysqli_query($SQLCon->connection, $sql)) {
        header('Location: ../index.php?page=users&error=3');
        break;
    }

    header('Location: ../index.php?page=users');
} else {
    header('Location: ../index.php?page=users&error=3');
}