<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="stylesheets/login_menu.css">

<?php

if (isset($_COOKIE['logged_on_user'])) {?>
    <div>
        <a class="special1" href="manage_account.php">Manage <?php echo ucfirst($_COOKIE['logged_on_user']); ?>'s profile</a>
        <a class="special2" href="logout.php">Logout</a>
    </div><?php
}
else {?>
    <a class="top_login" href="login.php">Login / Create account</a><?php
}

?>
