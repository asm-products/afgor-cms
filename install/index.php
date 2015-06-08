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



<?php $STYLE_PATH='../content/assets'; require_once('../dashboard/config/declarements.php'); ?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">

    <title> Afgor CMS Instalation</title>

    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/material.min.css" />
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/roboto.min.css">
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/ripples.css" />
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/custom.css" />

    <!-- JS include -->
    <script src="<?php echo $STYLE_PATH; ?>/angular/angular.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<body>

    <div style="margin-top: 30px;">
        <?php 
            if (isset($_GET["page"]) && htmlspecialchars($_GET["page"])=="part1" ) { 
                include('part1.php'); 
            } else if (isset($_GET["page"]) && htmlspecialchars($_GET["page"])=="part2" ) {
                include('part2.php');
            } else if (isset($_GET["page"]) && htmlspecialchars($_GET["page"])=="part3" ) {
                include('part3.php');
            } else { 
                include('part1.php');
            }
        ?>
    </div>

    <?php require_once( '../dashboard/assets/parts/footer.php');