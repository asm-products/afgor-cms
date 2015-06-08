<?php
$ini = new IniFile(CONFIG_PATH.'metadata.ini');
$dbhost = $ini->read('sql', 'dbhost', 'localhost');
$dbuser = $ini->read('sql', 'dbuser', 'root');
$dbpass = $ini->read('sql', 'dbpass', '');
$dbname = $ini->read('sql', 'dbname', 'mysql');