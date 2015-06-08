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

<?php $SQLCon=new SQLConnection(); $posts=$SQLCon->SQLGetPosts(); if ($posts->num_rows > 0) while ($row = $posts->fetch_assoc()) : ?>
<div class="col-md-4">
    <div class="card">
        <h3 class="card-heading simple"><?php echo $row["heading"]; ?></h3>
        <div class="card-body">
            <p>
                <?php echo $row["text"]; ?>
            </p>
            <hr>
            <i>By <?php echo $row["a_username"]; ?></i>
        </div>
    </div>
</div>
<?php endwhile; ?>