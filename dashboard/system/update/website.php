<?php

require_once('../../holders/ini.php');
require_once('../connection.php');

$ini = new IniFile('../../config/website.ini');

if (isset($_POST['theme'])) { $ini->write('theme', 'folder', $_POST['theme']); }
    
$ini->updateFile();

header('Location: ../../index.php?page=settings');