<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();

$posts = $SQLCon->SQLGetPosts();
$id = NULL;

if ($posts->num_rows > 0) {
    while ($row = $posts->fetch_assoc()) {
        if (htmlspecialchars($_GET["id"]) == $row["id"]) {
            $id = $row["id"];
        }
    }
}

$sql = "UPDATE afgor_posts SET heading='".$_POST['heading']."', text='".$_POST['text']."', a_username='".$_POST['author']."' WHERE id=".$id;
echo $sql;


if (!mysqli_query($SQLCon->connection, $sql)) {
    header('Location: ../index.php?page=posts&error=1');
    echo '<br>Error =(';
}
header('Location: ../index.php?page=posts');