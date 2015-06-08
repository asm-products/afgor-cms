<!--
The MIT License (MIT)

Copyright (c) Sat Jun 06 2015 Markus Benovsky

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

<?php include('assets/parts/navbar.php');
    $ini_dashboard = new IniFile(CONFIG_PATH.'dashboard.ini');
    $ini_website = new IniFile(CONFIG_PATH.'website.ini');
    $ini_theme = new IniFile('../content/'.$ini_website->read('theme', 'folder', 'default').'/theme.ini');
?>

<style type="text/css">
    body {
        padding-top: 100px;
        padding-bottom: 40px;
    }
</style>

<div id="settings" class="row">
    <div class="col-md-6">
        <?php if ($ini_dashboard->read('fields', 'settings_title', 'true') == true ||
                 $ini_dashboard->read('fields', 'settings_taggs', 'true') == true ||
                 $ini_dashboard->read('fields', 'settings_description', 'true') == true) : ?>
        <div class="panel panel-default">
            <h3 class="panel-heading">Metadata settings</h3>
            <form class="panel-body" role="form" method="post" action="system/update/metadata.php">
                    <?php if ($ini_dashboard->read('fields', 'settings_title', 'true') == true) : ?>
                        <p>A nice title for your website. Be creative. But be short</p>
                        <input class="form-control floating-label" type="text" placeholder="Type something…" name="title" value="<?php echo $wtitle; ?>" required>
                    <br>
                    <?php endif; ?>

                    <?php if ($ini_dashboard->read('fields', 'settings_taggs', 'true') == true) : ?>
                        <p>And some taggs for your website. Separate them by commas</p>
                        <input class="form-control floating-label" type="text" placeholder="eg. mywebsite, yourwebsite" name="taggs" value="<?php echo $wtaggs; ?>" required>
                    <br>
                    <?php endif; ?>

                    <?php if ($ini_dashboard->read('fields', 'settings_description', 'true') == true) : ?>
                        <p>Write some nice words about your website</p>
                        <textarea class="form-control" type="text">
                            <?php echo $wdescr; ?>
                        </textarea>
                    <br>
                    <?php endif; ?>
                    <button class="btn btn-<?php echo $ini_dashboard->read('interface', 'btn_type', 'primary'); ?>" data-loading-text="Please wait...">Update metadata settings</button>
            </form>
        </div>
        <?php endif; ?>
        
        <?php if ($ini_dashboard->read('fields', 'settings_sqlhost', 'true') == true ||
                 $ini_dashboard->read('fields', 'settings_sqluser', 'true') == true ||
                 $ini_dashboard->read('fields', 'settings_sqlpass', 'true') == true ||
                 $ini_dashboard->read('fields', 'settings_sqldbnm', 'true') == true) : ?>
        <div class="panel panel-default">
            <h3 class="panel-heading">Database connection settings</h3>
            <form class="panel-body" role="form" method="post">
                    <?php if ($ini_dashboard->read('fields', 'settings_sqlhost', 'true') == true) : ?>
                        <p>Sql DB host</p>
                        <input class="form-control floating-label" type="text" placeholder="eg. localhost" value="<?php echo $dbhost; ?>" required>
                    <br>
                    <?php endif; ?>

                    <?php if ($ini_dashboard->read('fields', 'settings_sqluser', 'true') == true) : ?>
                        <p>DB admin user</p>
                        <input class="form-control floating-label" type="text" placeholder="eg. root" value="<?php echo $dbuser; ?>" required>
                    <br>
                    <?php endif; ?>

                    <?php if ($ini_dashboard->read('fields', 'settings_sqlpass', 'true') == true) : ?>
                        <p>DB user password</p>
                        <input class="form-control floating-label" type="password" placeholder="eg. qwerty" value="<?php echo $dbpass; ?>" disabled>
                    <br>
                    <?php endif; ?>

                    <?php if ($ini_dashboard->read('fields', 'settings_sqldbnm', 'true') == true) : ?>
                        <p>Database name</p>
                        <input class="form-control floating-label" type="text" placeholder="eg. afgor-db" value="<?php echo $dbname; ?>" required>
                    <br>
                    <?php endif; ?>
                    <button class="btn btn-<?php echo $ini_dashboard->read('interface', 'btn_type', 'primary'); ?>" data-loading-text="Please wait...">Update SQL settings</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <h3 class="panel-heading">Website settings</h3>
            <form class="panel-body" role="form" method="post" action="system/update/website.php">
                <div class="form-group">
                    <p>Website theme</p>
                    <select name="theme" class="form-control" id="select">
                        <?php
                        if ($handle = opendir('../content/themes/')) {
                            while (false !== ($entry = readdir($handle))) {
                                if ($entry != "." && $entry != "..") echo "<option>$entry</option>";
                            }
                            closedir($handle);
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button class="btn btn-<?php echo $ini_dashboard->read('interface', 'btn_type', 'primary'); ?>" data-loading-text="Please wait...">Update website settings</button>
            </form>
        </div>
        
        <div class="panel panel-default">
            <h3 class="panel-heading">Dashboard settings</h3>
            <form class="panel-body" role="form" method="post" action="system/update/dashboard.php">
                <?php if ($ini_dashboard->read('fields', 'settings_nav_color', 'true') == true) : ?>
                    <p>Choose color for dashboard top bar</p>
                    <div class="form-group row">
                        <div class="col-lg-10">
                            <div class="radio radio-primary">
                                <label>
                                    <input name="nav_type" id="optionsRadio1" value="default" <?php if ($ini_dashboard->read('interface', 'nav_type', 'default') == 'default') echo 'checked=""' ?> type="radio">
                                    <p class="text-primary">Default</p>
                                </label>
                            </div>
                            <div class="radio radio-success">
                                <label>
                                    <input name="nav_type" id="optionsRadio2" value="success" <?php if ($ini_dashboard->read('interface', 'nav_type', 'success') == 'success') echo 'checked=""' ?> type="radio">
                                    <p class="text-success">Success</p>
                                </label>
                            </div>
                            <div class="radio radio-warning">
                                <label>
                                    <input name="nav_type" id="optionsRadio2" value="warning" <?php if ($ini_dashboard->read('interface', 'nav_type', 'warning') == 'warning') echo 'checked=""' ?> type="radio">
                                    <p class="text-warning">Warning</p>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                    <p>Choose color for dashboard action buttons</p>
                    <div class="form-group row">
                        <div class="col-lg-10">
                            <div class="radio radio-primary">
                                <label>
                                    <input name="btn_type" id="optionsRadio1" value="primary" <?php if ($ini_dashboard->read('interface', 'btn_type', 'primary') == 'primary') echo 'checked=""' ?> type="radio">
                                    <p class="text-primary">Default</p>
                                </label>
                            </div>
                            <div class="radio radio-success">
                                <label>
                                    <input name="btn_type" id="optionsRadio2" value="success" <?php if ($ini_dashboard->read('interface', 'btn_type', 'success') == 'success') echo 'checked=""' ?> type="radio">
                                    <p class="text-success">Success</p>
                                </label>
                            </div>
                            <div class="radio radio-warning">
                                <label>
                                    <input name="btn_type" id="optionsRadio2" value="warning" <?php if ($ini_dashboard->read('interface', 'btn_type', 'warning') == 'warning') echo 'checked=""' ?> type="radio">
                                    <p class="text-warning">Warning</p>
                                </label>
                            </div>
                        </div>
                    </div>
                
                    <p>Choose correct option active or not</p>
                    <div class="checkbox">
                        <label>
                            <input name="show_sql" type="checkbox" <?php if ($ini_dashboard->read('fields', 'settings_sqlhost', 1) == 1) echo 'checked' ?> > Show SQL settings part
                        </label>
                    </div>
                <br>
                <button class="btn btn-<?php echo $ini_dashboard->read('interface', 'btn_type', 'primary'); ?>" data-loading-text="Please wait...">Update dashboard settings</button>
            </form>
        </div>
    </div>
</div>