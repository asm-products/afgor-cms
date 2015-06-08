<?php

class SQLConnection {
    
    var $connection;
    
    function SQLConnection($dbhost = NULL, $dbuser = NULL, $dbpass = NULL, $dbname = NULL) {
        if (!isset($dbhost) || !isset($dbuser) || !isset($dbname)) {
            $ini = new IniFile(CONFIG_PATH.'metadata.ini');
            $dbhost = $ini->read('sql', 'dbhost', 'localhost');
            $dbuser = $ini->read('sql', 'dbuser', 'root');
            $dbpass = $ini->read('sql', 'dbpass', '');
            $dbname = $ini->read('sql', 'dbname', 'mysql');
        }
        
        // Create connection
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        if (mysqli_connect_error()) {
            echo 'Failed to connect';
        } 
        //echo 'Connected to sql!<br>';
    }
    
    function get_tables() {
        $tableList = array();
        $res = mysqli_query($this->$connection,"SHOW TABLES");
        while($cRow = mysqli_fetch_array($res))
        {
            $tableList[] = $cRow[0];
        }
        return $tableList;
    }
    
    function SQLCreateTB($sql) {
        echo 'Trying to create the table...<br>';
        // Create student table
        $create_tbl = $this->connection->query($sql);

        if ($create_tbl) {
            echo "Table has created<br>";
            return true;
        }
        else {
            echo 'Unsuccess =(<br>';
            echo mysqli_error($this->connection)."<br>";
            return true;
        }
    }
    
    function SQLDeleteTB($sql) {
        echo 'Trying to delete the table...<br>';
        // Create student table
        $delete_tbl = $this->connection->query($sql);

        if ($delete_tbl) {
            echo "Table has been dropped<br>";
            return true;
        }
        else {
            echo 'Unsuccess =(<br>';
            echo mysqli_error($this->connection)."<br>";
            return true;
        }
    }
    
    function SQLClose() {
        $this->connection->close();
    }
    
    function SQLUpdateUserIp($id, $value) {
        $sql = "UPDATE afgor_users SET ip='$value' WHERE id=$id";
        //echo $sql;
        mysqli_query($this->connection, $sql) 
            or die(mysqli_error($this->connection));
    }
    
    function SQLGetUsers() {
        $sql = "SELECT * FROM afgor_users";
        $result = mysqli_query($this->connection, $sql);
        
        return $result;
    }
    
    function SQLGetPosts() {
        $sql = "SELECT * FROM afgor_posts";
        $result = mysqli_query($this->connection, $sql);
        
        return $result;
    }
    
    function SQLGetMedia() {
        $sql = "SELECT * FROM afgor_media";
        $result = mysqli_query($this->connection, $sql);
        
        return $result;
    }
}