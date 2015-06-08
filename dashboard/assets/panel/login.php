<style type="text/css">
    body {
        padding-top: 140px;
        padding-bottom: 40px;
        background-color: #E5E5E5;
    }
</style>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form class="card" method="post" action="index.php">
            <fieldset>
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" class="form-control floating-label" placeholder="Username" name="username" type="text">
                <input type="password" class="form-control floating-label" placeholder="Password" name="password" type="password">
                <a class="btn btn-info" type="submit" href="../">Return to homepage</a>
                <button class="btn btn-success" type="submit">Sign in</button>

                <?php if ($system == 3) : ?>
                <hr>
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Hooray!</strong> You successfuly signed out.
                </div>
                <?php endif; ?>

                <?php if ($system == 2) : ?>
                <hr>
                <div class="alert alert-dismissable alert-info">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Wow!</strong> You need to enter both username and password. Please check the fields and try again.
                </div>
                <?php endif; ?>

                <?php if ($system == 0) : ?>
                <hr>
                <div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4 class="alert-heading">Oh snap! Wrong user details!</h4>
                    <p>Change username and/or password and try again. Hope this would help you. If not claim forgotten password.</p>
                </div>
                <?php endif; ?>
            </fieldset>
        </form>
    </div>
</div>