<html>

<head>
    <meta charset="UTF-8">

    <title>
        <?php if ($page_title != "") echo $page_title; else echo "Afgor CMS"; ?>
    </title>

    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/roboto.min.css">
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/material.min.css" />
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/ripples.min.css" />
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/prism.min.css">

    <!-- Here you can add your own css -->
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/custom.css" />
    <link rel="stylesheet" href="<?php echo $STYLE_PATH; ?>/css/bootstrap-markdown.min.css">
    
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="<?php echo $STYLE_PATH; ?>/js/bootstrap-markdown.js"></script>
</head>

<body class="dashboard">