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
//Write the header includes
$ini = new IniFile('dashboard/config/metadata.ini');

$page_title = $ini->read('general', 'title', 'Sample title');
$STYLE_PATH = 'content/assets/';
require_once('dashboard/config/declarements.php');
require_once('dashboard/'.HD_PATH);
?>

      <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)"><?php echo $page_title; ?> | Welcome</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="dashboard/">Go to Dashboard</a></li>
            </ul>
        </div>
    </div>

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit" style="margin-top: 100px">
         <div class="container">
            <h1>Hello, user!</h1>
            <p>This is just a customizable template. Your free to use it as you want. Find it at /afgor/themes/default/. Here you can see some your posts.</p>
         </div>
      </div>


      <div class="container">

      <!-- Example row of columns -->
      <div class="row">
          <!--
            This is the example usage
            of loop include on your website
            To know how to use it, you can visit
            the how-to page and read it. 
            -->
          <?php include(LOOP_PATH); ?>
      </div>
          
      <div class="row">
          <!--
            This is the example usage
            of loop include on your website
            To know how to use it, you can visit
            the how-to page and read it. 
            -->
          <?php include(IMAGES_PATH); ?>
      </div>

      <footer>
        <p>© Company 2013</p>
      </footer>

      </div> <!-- /container -->
<?php
require_once('dashboard/'.FT_PATH);