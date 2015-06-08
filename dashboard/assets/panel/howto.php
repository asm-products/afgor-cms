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

<?php include('assets/parts/navbar.php'); ?>

<style type="text/css">
    body {
        padding-top: 100px;
        padding-bottom: 40px;
    }
</style>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-body">
                <h4>How to add a post loop to your website</h4>
                <p>The main feature of every cms is a post loop. So when you created your own theme and you want to add your news loop to it, you should add the following to your page.</p>
                <pre><code class="language-php">&lt;?php include(LOOP_PATH); ?&gt;</code></pre>
                <br>
                <p>After this, you can go and edit loop file in</p><pre>'content/website/loop.php'</pre>
                <hr>
                <form>
                    <input class="form-control floating-label" name="title" type="text" placeholder="Title?" />
                    <textarea class="form-control" name="content" data-provide="markdown" rows="10"></textarea>
                </form> 
                <hr>
                <p>More will be soon.</p>
            </div>
        </div>
    </div>
</div>