<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();

$users = $SQLCon->SQLGetUsers();
$id = NULL;

if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {
        if ($_POST['username'] == $row["username"]) {
            $id = $row["id"];
        }
    }
}

$sql = "UPDATE afgor_users SET username='".$_POST['username']."', email='".$_POST['email']."', role='".$_POST['role']."' WHERE id=".$id;
echo $sql;


if (!mysqli_query($SQLCon->connection, $sql)) {
    header('Location: ../index.php?page=users&error=4');
    echo '<br>Error =(';
}
header('Location: ../index.php?page=users');