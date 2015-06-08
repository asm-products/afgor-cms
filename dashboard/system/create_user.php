<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();

$users = $SQLCon->SQLGetUsers();
$exists = false;

if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {
        if ($_POST['username'] == $row["username"]) {
            header('Location: ../index.php?page=users&error=1');
            $exists = true;
        }
    }
}

$sql = "INSERT INTO afgor_users (username, email, password, role) VALUES ('".$_POST['username']."', '".$_POST['email']."', '".MD5($_POST['password'])."', '".$_POST['role']."')";


if (!$exists && !mysqli_query($SQLCon->connection, $sql)) {
    header('Location: ../index.php?page=users&error=2');
    echo '<br>Error =(';
}

if (!$exists) header('Location: ../index.php?page=users');