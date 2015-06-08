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

<?php include('assets/parts/navbar.php'); $SQLCon = new SQLConnection(); $users = $SQLCon->SQLGetUsers(); ?>

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
            <h4>Warning!</h4> Such user already exists, try again but now with another username. Hope this was helpful. Or contact your system administrator.
        </div>
    </div>
    <?php endif; ?>
    <?php if (htmlspecialchars($_GET["error"]) == "2") : ?>
    <div class="col-md-12">
        <div class="row alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Warning! SQL Connection Error! We couldnt connect to the server database and / or add row to the table!</h4>
        </div>
    </div>
    <?php endif; ?>
    <?php if (htmlspecialchars($_GET["error"]) == "3") : ?>
    <div class="col-md-12">
        <div class="row alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>User cannot be deleted!</h4>
        </div>
    </div>
    <?php endif; ?>
    <?php if (htmlspecialchars($_GET["error"]) == "4") : ?>
    <div class="col-md-12">
        <div class="row alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Oooops. User cannot be edited!</h4>
        </div>
    </div>
    <?php endif; ?>
    <div class="col-md-12">
        <div class="panel">
            <h3 class="panel-heading">Here you can view and edit user profiles</h3>
            <table class="table" style="margin-top: 25px;">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>Last IP</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users->num_rows > 0) { $i = 1; while ($row = $users->fetch_assoc()) { echo '
                    <tr>
                        <td></td>'; echo '
                        <td>'.$i.'</td>'; echo '
                        <td>'.$row["username"].'</td>'; echo '
                        <td>'.$row["email"].'</td>'; echo '
                        <td>'.$row["role"].'</td>'; echo '
                        <td>'.$row["ip"].'</td>'; echo '
                        <td><input id="editButton" type="button" class="btn" value="Edit" onclick="setGetParameter('; echo "'user', ".$row["id"]; echo ');"/>
                            <a href="system/delete_user.php?user='.$row["id"].'" role="button" class="btn btn-danger" data-toggle="modal">Delete</a>
                        </td>'; echo '</tr>'; $i++; } } ?>
                    <!--<td><a href="index.php?page=users&user='.$row["id"].'" role="button" class="btn">Edit</a>-->
                </tbody>
            </table>
            <div class="panel-actions">
                <a href="#createUser" role="button" class="btn btn-<?php echo $ini->read('interface', 'btn_type', 'primary'); ?>" data-toggle="modal" data-target="#createUser">Create new user</a>
            </div>
        </div>
    </div>
</div>
<!-- Create User Modal -->
<div id="createUser" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="creating" method="post" action="system/create_user.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">User creation form</h3>
                </div>
                <div class="modal-body">
                    <p>Username</p>
                    <input class="form-control floating-label" type="text" name="username" placeholder="eg. Jhonny" required>
                    <p>&nbsp;</p>
                    <p>Password</p>
                    <input class="form-control floating-label" name="password" type="password" required>
                    <p>&nbsp;</p>
                    <p>Email</p>
                    <input class="form-control floating-label" type="text" name="email" placeholder="eg. johnny@afgor.com">
                    <p>&nbsp;</p>
                    <p>User role</p>
                    <p><small>0 - admin, 1 - user</small>
                    </p>
                    <input class="form-control floating-label" type="text" name="role" placeholder="eg. 0" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel creation</button>
                    <button type="submit" class="btn btn-success">Create this user</button>
                </div>
            </form>
        </div>
    </div>
</div>
 <!-- Edit User Modal -->
<div id="editUser" class="modal fade" tabindex="-2">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="editing" method="post" action="system/edit_user.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">User editing form</h3>
                </div>
                <?php $users = $SQLCon->SQLGetUsers(); if (htmlspecialchars($_GET["user"]) != NULL && $users->num_rows > 0) { while ($row = $users->fetch_assoc()) { if ($row["id"] == htmlspecialchars($_GET["user"])) { $username = $row["username"]; $password = ($row['password']); $email = $row["email"]; $role = $row["role"]; } } } ?>
                <div class="modal-body">
                    <p>Username</p>
                    <input class="form-control floating-label" type="text" name="username" placeholder="eg. Jhonny" required value="<?php echo $username; ?>" disabled>
                    <p>&nbsp;</p>
                    <p>Password</p>
                    <input class="form-control floating-label" type="password" name="password" disabled required value="<?php echo $password; ?>">
                    <p>&nbsp;</p>
                    <p>Email</p>
                    <input class="form-control floating-label" type="email" name="email" placeholder="eg. johnny@afgor.com" value="<?php echo $email; ?>">
                    <p>&nbsp;</p>
                    <p>User role</p>
                    <p><small>0 - admin, 1 - user</small>
                    </p>
                    <input class="form-control floating-label" type="text" name="role" placeholder="eg. 0" required value="<?php echo $role; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel editing</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>