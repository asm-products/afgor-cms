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

<?php include('assets/parts/navbar.php'); $SQLCon = new SQLConnection(); $users = $SQLCon->SQLGetUsers(); $media = $SQLCon->SQLGetMedia(); ?>

<style type="text/css">
    body {
        padding-top: 100px;
        padding-bottom: 40px;
    }
</style>
<div class="row">
    <?php if (htmlspecialchars($_GET["error"]) == "1") : ?>
    <div class="col-md-12">
        <div class="row alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Warning!</h4> An error occured while changing media information.
        </div>
    </div>
    <?php endif; ?>
    <div class="col-md-12">
        <div class="panel">
            <h3 class="panel-heading">Existing media resources</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Heading for your file</th>
                        <th>Short description if it</th>
                        <th>Author</th>
                        <th>Written</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($media->num_rows > 0) { $i = 1; while ($row = $media->fetch_assoc()) { echo '
                    <tr>'; echo '
                        <td>'.$i.'</td>'; echo '
                        <td><div class="row-picture"><img height="50px" class="circle" src="../'.$row["file"].'" alt="icon"></div></td>'; echo '
                        <td>'.$row["heading"].'</td>'; echo '
                        <td>'.substr($row["description"], 0, 200).'</td>'; echo '
                        <td>'.$row["a_username"].'</td>'; echo '
                        <td>'.$row["a_time"].'</td>'; echo '
                        <td><input id="editButton" type="button" value="edit" class="btn" onclick="setGetParameter('; echo "'media', ".$row["id"]; echo ');" />
                        <a href="system/delete_media.php?media='.$row["id"].'" role="button" class="btn btn-danger">Delete</a>
                        </td>'; echo '</tr>'; $i++; } } ?>
                </tbody>
            </table>
            <br>
            <h3 class="panel-heading">Add new media</h3>
            <div class="panel-body">
                <form role="form" method="post" action="system/create_media.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <p>Choose an image to upload</p>
                        <input type="file" name="media" />
                        <p>&nbsp;</p>
                        <p>Media name</p>
                        <input class="form-control floating-label" type="text" placeholder="Type something…" name="heading" required>
                        <p>&nbsp;</p>
                        <p>Some taggs for your media</p>
                        <input class="form-control floating-label" type="text" placeholder="awesome, nice, media" name="taggs" required>
                        <p>&nbsp;</p>
                        <p>Here is your description</p>
                        <textarea id="editor" class="form-control floating-label" class="ckeditor" cols="80" id="editor2" name="description" rows="10"></textarea>
                        <p>&nbsp;</p>
                        <p>Author</p>
                        <select class="form-control" name="author">
                            <?php if ($users->num_rows > 0) { while ($row = $users->fetch_assoc()) { echo '
                            <option>'.$row["username"].'</option>'; } } ?>
                        </select>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-<?php echo $ini->read('interface', 'btn_type', 'primary'); ?>">Add media</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Post Modal -->
<div id="editMedia" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="editing" method="post" action="system/edit_media.php?id=<?php echo htmlspecialchars($_GET["media"]); ?>">
                <div class="modal-header">
                    <h3 id="myModalLabel">User editing form</h3>
                </div>
                <?php $media = $SQLCon->SQLGetPosts(); $users = $SQLCon->SQLGetUsers(); if (htmlspecialchars($_GET["media"]) != NULL && $media->num_rows > 0) { while ($row = $media->fetch_assoc()) { if ($row["id"] == htmlspecialchars($_GET["media"])) { $username = $row["a_username"]; $heading = $row["heading"]; $text = $row["description"]; $taggs = $row["a_taggs"]; } } } ?>
                <div class="modal-body">
                    <p>Pick a nice heading for your post</p>
                    <input class="form-control floating-label" type="text" placeholder="Type something…" name="heading" required value="<?php echo $heading; ?>">
                    <p>&nbsp;</p>
                    <p>Some taggs for your post</p>
                    <input class="form-control floating-label" type="text" placeholder="awesome, nice, post" name="taggs" required value="<?php echo $taggs; ?>">
                    <p>&nbsp;</p>
                    <p>Here is your media description</p>
                    <textarea id="editor" class="form-control floating-label" class="ckeditor" cols="80" id="editor2" name="text" rows="10" required><?php echo $text; ?></textarea>
                    <p>&nbsp;</p>
                    <p>Author</p>
                    <select class="form-control" name="author">
                        <?php echo '<option>'.$username.'</option>'; ?>
                        <?php if ($users->num_rows > 0) { while ($row = $users->fetch_assoc()) if ($row["username"] != $username) { echo '
                        <option>'.$row["username"].'</option>'; } } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-warning" data-dismiss="modal" aria-hidden="true" href="index.php?page=posts">Cancel editing</a>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>