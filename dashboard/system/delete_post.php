<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();
$posts = $SQLCon->SQLGetPosts();

if ($posts->num_rows > 0) {
    $post = htmlspecialchars($_GET["post"]);
    $sql = "DELETE FROM afgor_posts WHERE id=$post";

    if (!mysqli_query($SQLCon->connection, $sql)) {
        header('Location: ../index.php?page=posts&error=2');
        echo '<br>Error =(';
    }

    header('Location: ../index.php?page=posts');
} else {
    header('Location: ../index.php?page=posts&error=3');
}