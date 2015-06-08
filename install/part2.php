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


<form class="col-md-6 col-md-offset-3" action="action.php?page=part2" method="post">
    <div class="panel">
        <div class="panel-body">
            <h3>Welcome to <strong>Afgor CMS</strong> install</h3>
            <h4>Page 2</h4>
            <?php if (isset($_GET[ "error"]) && (int)htmlspecialchars($_GET[ "error"])==1 ) : ?>
            <div class="alert alert-block alert-error fade in">
                <strong>Ooops!</strong> Sql connection error.
            </div>
            <?php else : ?>
            <br>
            <?php endif; ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3>Database details</h3>
            <p>Your database host.</p>
            <div class="input-group">
                <span class="input-group-addon">http://</span>
                <input class="form-control floating-label" type="text" name="dbhost" placeholder="eg. localhost" required>
            </div>
            <br>

            <h3>Database auth username</h3>
            <p>To connect to the db.</p>
            <input class="form-control floating-label" type="text" name="dbuser" placeholder="eg. root" required>
            <br>

            <h3>Database auth password</h3>
            <p>Tour username's password.</p>
            <input class="form-control floating-label" type="password" name="dbpass" placeholder="eg. password">
            <br>

            <h3>Database name</h3>
            <p>There will be storred all your data and tables.</p>
            <input class="form-control floating-label" type="text" name="dbname" placeholder="eg. mysql" required>
            <br>
        </div>
        <div class="panel-actions">
            <button class="btn btn-large btn-success">Apply and continue</button>
            <a href="index.php" class="btn btn-info">Return to previous</a>
        </div>
    </div>
</form>