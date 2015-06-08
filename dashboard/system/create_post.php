<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();

$users = $SQLCon->SQLGetUsers();
$posts = $SQLCon->SQLGetPosts();

$today = date("Y-m-d H:i:s");

$sql = "INSERT INTO afgor_posts (heading, a_taggs, a_time, text, a_username) VALUES ('".$_POST['heading']."', '".$_POST['taggs']."', '".$today."', '".$_POST['text']."', '".$_POST['author']."')";

if (!mysqli_query($SQLCon->connection, $sql)) {
    header('Location: ../index.php?page=posts&error=1');
    echo "Error =(".mysqli_connect_error();
}
header('Location: ../index.php?page=posts');