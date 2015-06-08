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


<form class="col-md-6 col-md-offset-3" action="action.php?page=part3" method="post">
    <div class="panel">
        <div class="panel-body">
            <h3>Welcome to <strong>Afgor CMS</strong> install</h3>
            <h4>Page 3</h4>
            <br>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3>Administrator user details</h3>
            <p>Your Email.</p>
            <input class="form-control floating-label" type="text" name="email" placeholder="eg. afgor@gmail.com" required>
            <br>
            
            <p>Username.</p>
            <input class="form-control floating-label" type="text" name="username" placeholder="eg. admin" required>
            <br>
            
            <p>Password.</p>
            <input class="form-control floating-label" type="password" name="password" placeholder="eg. admin" required>
            <br>
            
            <h3>Now, how to start ?</h3>
            <h4>After clicking next and starting your administration, please delete the install folder.<br>Hope you'll have awesome experience with our cms :D</h4>
        </div>

        <div class="panel-actions">
            <button class="btn btn-large btn-success">Hooray! Lets start!</button>
            <a href="index.php?page=part2" class="btn btn-info">Return to previous</a>
        </div>
    </div>
</form>