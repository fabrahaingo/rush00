<?php include ('session_start.php'); ?>
<?php

/* ===== Change that with the real authentification function === */
if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']) && $_POST['submit'] === 'Register') {
    setcookie("logged_on_user", $_POST['login'], time()+3600);
    header('Location: index.php');
}
else {
    header('Location: ' . $_SERVER['PHP_SELF']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <header>
        <?php include ('menu.php'); ?>
        <?php include ('login_menu.php'); ?>
    </header>
        <link rel="stylesheet" type="text/css" href="stylesheets/register_form.css">
        <form class="register_form" action='register.php' method='POST'>
            <div class='login'>New user:<br>
                <input type='text' name='login' value='' maxlength="12" placeholder="Max. 12 characters" autofocus required/></div>
            <div class='password'>New password:<br>
                <input type='password' name='passwd' value='' placeholder="" required/></div>
            <div class='push'><input class='button' type='submit' name='submit' value='Register' /></div>
        </form>
        <?php include ('footer.php'); ?>
</body>
<html>
