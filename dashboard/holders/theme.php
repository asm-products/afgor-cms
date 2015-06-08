<?php

//require('afgor/holders/ini.php'); 

class theme {
    
    var $ini;
    
    function theme() {
        $this->ini = parse_ini_file('dashboard/config/website.ini', 1);
    }
    
    function includeCurrentIndexFile() {
        include('content/themes/'.$this->ini["theme"]["folder"].'/'.$this->ini['theme']['file']);
    }
}
?>