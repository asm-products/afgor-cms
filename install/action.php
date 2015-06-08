<?php

require('../dashboard/holders/ini.php');
require('../dashboard/system/connection.php');

define("CONFIG_PATH", '../dashboard/config/');

if (htmlspecialchars($_GET["page"]) == "part1") {
    part_1_action();
} else if (htmlspecialchars($_GET["page"]) == "part2") {
    part_2_action();
} else if (htmlspecialchars($_GET["page"]) == "part3") {
    part_3_action();
}

function part_1_action() {
    $ini = new IniFile('../dashboard/config/metadata.ini'); 
    
    $ini->write('general', 'title', $_POST['title']);
    $ini->write('general', 'taggs', $_POST['taggs']);
    $ini->write('general', 'descr', $_POST['descr']);
    
    $ini->updateFile();
    header('Location: index.php?page=part2');
}

function part_2_action() {
    
    $SQLCon = new SQLConnection($_POST['dbhost'], $_POST['dbuser'], $_POST['dbpass'], $_POST['dbname']);

    $users_sql =
    'CREATE TABLE IF NOT EXISTS afgor_users
    (
        id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(200) NOT NULL,
        email VARCHAR(200) NOT NULL,
        password VARCHAR(200) NOT NULL,
        role INT NOT NULL,
        ip VARCHAR(200) NULL,
        PRIMARY KEY(id)
    )';
    
    $posts_sql =
    'CREATE TABLE IF NOT EXISTS afgor_posts
    (
        id INT NOT NULL AUTO_INCREMENT,
        heading TEXT NOT NULL,
        text TEXT NOT NULL,
        a_username TEXT NOT NULL,
        a_time DATETIME NOT NULL,
        a_taggs TEXT NULL,
        PRIMARY KEY(id)
    )';
    
    $media_sql =
    'CREATE TABLE IF NOT EXISTS afgor_media
    (
        id INT NOT NULL AUTO_INCREMENT,
        heading TEXT NOT NULL,
        description TEXT NOT NULL,
        file LONGTEXT NOT NULL,
        a_username TEXT NOT NULL,
        a_time DATETIME NOT NULL,
        a_taggs TEXT NULL,
        PRIMARY KEY(id)
    )';
    
    $SQLCon->SQLDeleteTB('DROP TABLE IF EXISTS `afgor_users`');
    $SQLCon->SQLDeleteTB('DROP TABLE IF EXISTS `afgor_posts`');
    $SQLCon->SQLDeleteTB('DROP TABLE IF EXISTS `afgor_media`');
    
    echo "<br>Creating tables<br>";
    $create_table = $SQLCon->SQLCreateTB($users_sql);
    $create_posts = $SQLCon->SQLCreateTB($posts_sql);
    $create_medias = $SQLCon->SQLCreateTB($media_sql);
    
    if (!$create_table || !$create_posts || !$create_medias) {
        header('Location: index.php?page=part2&error=1');
    }
        
    $SQLCon->SQLClose();
        
    //WORKING WITH INI FILES NOW
    $ini = new IniFile('../dashboard/config/metadata.ini'); 

    $ini->write('sql', 'dbhost', $_POST['dbhost']);
    $ini->write('sql', 'dbuser', $_POST['dbuser']);
    $ini->write('sql', 'dbpass', '"'.$_POST['dbpass'].'"');
    $ini->write('sql', 'dbname', $_POST['dbname']);

    $ini->updateFile();

    header('Location: index.php?page=part3');
}

function part_3_action() {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $SQLCon = new SQLConnection();
    
        $sql = "INSERT INTO afgor_users (username, email, password) VALUES ('".$_POST['username']."', '".$_POST['email']."', '".MD5($_POST['password'])."')";

        if (!mysqli_query($SQLCon->connection, $sql)) {
            header('Location: index.php?page=part3&error=1');
        }
    }
    
    header('Location: ../dashboard/index.php');
}