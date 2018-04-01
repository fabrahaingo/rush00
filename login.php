<?php include ('session_start.php'); ?>
<?php

include ('./functions/auth.php');
isset($_POST['login']) ? $login = $_POST['login'] : $login = "";
isset($_POST['passwd']) ? $passwd = $_POST['passwd'] : $passwd = "";
/* ===== If authentification succeeded, then set cookie, display message and redirect. IF NOT, make sure
    the coockie is not set, and display error message ===== */
if (auth($login, $passwd)) {
    setcookie("logged_on_user", $_POST['login'], time() + 3600);
    echo "<script>alert(\"Hourray ! You successfuly logged in ! 🎉\");</script>";
    header('Refresh: 0; URL="index.php"');
}
else if (isset($_POST['login'])) {
    setcookie("logged_on_user", null, time() - 3600);
    echo "<script>alert(\"Woops, the loggin/password you typed in is wrong... 😵\");</script>";
    header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);
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
        <link rel="stylesheet" type="text/css" href="stylesheets/login_form.css">
        <form class="log_form" action='login.php' method='POST'>
            <div class='login'>Login:<br>
                <input type='text' name='login' value='' placeholder="Username" autofocus required/></div>
            <div class='password'>Password:<br />
                <input type='password' name='passwd' value='' placeholder="Password" required/></div>
            <div class='push'>
                <input class='button' type='submit' name='submit' value='Log in' />
            </div>
            <br />
            <br />
            <br />
            Not a member yet ? <a href="register.php">Register</a> 😉
        </form>
        <?php include ('footer.php'); ?>
</body>
<html>
