<?php
$ini = new IniFile(CONFIG_PATH.'metadata.ini');
$wtitle = $ini->read('general', 'title', 'Afgor CMS Website');
$wtaggs = $ini->read('general', 'taggs', '');
$wdescr = $ini->read('general', 'descr', 'Just an another wesite');