<?php

require_once('../../holders/ini.php');
require_once('../connection.php');

$ini = new IniFile('../../config/metadata.ini');

if(isset($_POST['title'])) { $ini->write('general', 'title', $_POST['title']); }
if(isset($_POST['taggs'])) { $ini->write('general', 'taggs', $_POST['taggs']); }
if(isset($_POST['descr'])) { $ini->write('general', 'descr', $_POST['descr']); }
    
$ini->updateFile();
   
header('Location: ../../index.php?page=settings');