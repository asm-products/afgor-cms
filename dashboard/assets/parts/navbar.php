<?php $ini = new IniFile(CONFIG_PATH.'dashboard.ini'); ?>

<div class="navbar navbar-<?php echo $ini->read('interface', 'nav_type', 'default'); ?> navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">Afgor CMS</a>
    </div>
    <div class="navbar-collapse collapse navbar-warning-collapse">
        <ul class="nav navbar-nav">
            <li class="<?php if (htmlspecialchars($_GET["page"]) == "") echo 'active'; ?>"><a href="index.php">Home</a>
            </li>
            <li class="<?php if (htmlspecialchars($_GET["page"]) == "posts") echo 'active'; ?>"><a href="index.php?page=posts">Posts</a>
            </li>
            <li class="<?php if (htmlspecialchars($_GET["page"]) == "media") echo 'active'; ?>"><a href="index.php?page=media">Media</a>
            </li>
            <li class="<?php if (htmlspecialchars($_GET["page"]) == "users") echo 'active'; ?>"><a href="index.php?page=users">Users</a>
            </li>
            <li class="<?php if (htmlspecialchars($_GET["page"]) == "settings") echo 'active'; ?>"><a href="index.php?page=settings">Settings</a>
            </li>
            <li class="<?php if (htmlspecialchars($_GET["page"]) == "howto") echo 'active'; ?>"><a href="index.php?page=howto">How to use</a>
            </li>
            <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?signout=1">Sign out</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
            <li><a href="../">Visit your website</a></li>
        </ul>
    </div>
</div>