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


<form class="col-md-6 col-md-offset-3" action="action.php?page=part1" method="post">
    <div class="panel">
        <div class="panel-body">
            <h3>Welcome to <strong>Afgor CMS</strong> install</h3>
            <h4>Page 1</h4>
            <br>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3>Your website title</h3>
            <p>A nice title for your pages. Be creative.</p>
            <input class="form-control floating-label" type="text" name="title" placeholder="Website about kittens, yay!" required>
            <br>
            
            <h3>Your website taggs</h3>
            <p>So people can easily find your website. Separate them by commas.</p>
            <input class="form-control floating-label" type="text" name="taggs" placeholder="eg. mywebsite, yourwebsite" required>
            <br>
            
            <h3>Describe your website</h3>
            <textarea class="form-control floating-label" name="descr" type="text" placeholder="Write some nice words about your website, so other people will be interested in." required></textarea>
        </div>
        <div class="panel-actions">
            <button class="btn btn-large btn-success">Apply and continue</button>
        </div>
    </div>
</form>