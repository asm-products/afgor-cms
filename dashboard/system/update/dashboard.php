<?php

require_once('../../holders/ini.php');
require_once('../connection.php');

$ini = new IniFile('../../config/dashboard.ini');

if(isset($_POST['nav_type'])) { $ini->write('interface', 'nav_type', $_POST['nav_type']); }
if(isset($_POST['btn_type'])) { $ini->write('interface', 'btn_type', $_POST['btn_type']); }

$ini->write('fields', 'settings_sqlhost', isset($_POST['show_sql'])); 
$ini->write('fields', 'settings_sqluser', isset($_POST['show_sql'])); 
$ini->write('fields', 'settings_sqlpass', isset($_POST['show_sql'])); 
$ini->write('fields', 'settings_sqldbnm', isset($_POST['show_sql'])); 
    
$ini->updateFile();

header('Location: ../../index.php?page=settings');