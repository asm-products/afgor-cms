<?php
if(session_id() == '') {
    $lifetime=600;
    session_start();
    setcookie(session_name(), session_id(), time()+$lifetime);
}
?>
<!--
The MIT License (MIT)

Copyright (c) Wed Jun 03 2015 Markus Benovsky

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->


<?php

//Redeclare the assets pathinfo
$STYLE_PATH = '../content/assets';

//Require ini holder
require_once('holders/ini.php');

//Require the main system declares to use in panel
require_once('config/declarements.php');
//Require sql settings and metadata settings
require_once('config/meta.php');
require_once('config/sql.php');

//Require AUTH system
require_once('system/auth.php');
require_once('system/connection.php');

// set error reporting level
if (version_compare(phpversion(), "5.2.0", ">=") == 1) {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
} else {
    error_reporting(E_ALL & ~E_NOTICE);
}


// initialization of login system and generation code
/*
 * THE MAIN INDEX FILE MARKUP
 */
require_once('file.php');
