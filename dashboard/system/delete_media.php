<?php

require_once('../holders/ini.php');
//require_once('../config/declarements.php');
define("CONFIG_PATH", '../config/');
require_once('connection.php');

$SQLCon = new SQLConnection();
$medias = $SQLCon->SQLGetMedia();

if ($medias->num_rows > 0) {
    $media = htmlspecialchars($_GET["media"]);
    $sql = "DELETE FROM afgor_media WHERE id=$media";

    if (!mysqli_query($SQLCon->connection, $sql)) {
        header('Location: ../index.php?page=media&error=2');
        echo '<br>Error =(';
    }

    header('Location: ../index.php?page=media');
} else {
    header('Location: ../index.php?page=media&error=3');
}