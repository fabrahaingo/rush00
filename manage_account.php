<?php include ('session_start.php'); ?>
<?php

/* ===== Change reaction for when the user modifies his password (if combination TRUE or FALSE) ===== */
if (isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['submit']) && $_POST['submit'] === "Modify") {
    echo "<script>alert(\"Your password has been modified\")</script>";
    header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);
}

/* ===== Change reaction for when the user deletes his account (if function check password returns TRUE) ===== */
if (isset($_POST['delete_account']) && isset($_POST['submit']) && $_POST['submit'] === "Goodbye") {
    setcookie("logged_on_user", "", time()-3600);
    echo "<script>alert(\"Your account has been deleted\")</script>";
    header('Refresh: 0; URL="index.php"');
}

/* ===== HTML only shows up if user is logged in ===== */
if (isset($_COOKIE['logged_on_user'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="stylesheets/modify_form.css">
</head>
<body>
    <header>
        <?php include ('menu.php'); ?>
        <?php include ('login_menu.php'); ?>
    </header>
    <form class="modify_form" action='manage_account.php' method='POST'>
        <div class='login'><br />
            <i>Want to modify your password ? Fill out this form</i> 👇<br />
            <br />
            <br />
            Login:
            <br />
            <input type='text' name='login' value='' placeholder="Username" required autofocus/></div>
        <div class='old_password'>Old password:<br>
            <input type='password' name='oldpw' value='' placeholder="Current password" required/></div>
        <div class='new_password'>New password:<br>
            <input type='password' name='newpw' value='' placeholder="Max. 12 characters" required/></div>
        <div class='push'><input class='button' type='submit' name='submit' value='Modify' /></div>
        <br />
    </form>
    <form class="delete_form" action="manage_account.php" method='POST'>
        <div><br />
        <i>Don't wanna buy amazing thing anymore 😢 ?</i><br />
        <br /><br />
        Type in your password to confirm your choice:
        <br /><br />
        <input type='password' name='delete_account' value='' placeholder="Password" required/></div>
        <div class='push'><input type='submit' name='submit' value='Goodbye' /></div>
        <br />
    </form>
        <?php include ('footer.php'); ?>
</body>
<html>
<?php
}

/* ===== If no cookie is set, shows nothing and redirect to the login page ===== */
else
    header("Location: login.php");
?>
