<?php include ('session_start.php'); ?>
<?php

/* ===== Change to check if combinaison of PASSWD and USER returns TRUE or FALSE ===== */
if (isset($_POST['login']) && isset($_POST['passwd'])) {
    setcookie("logged_on_user", $_POST['login'], time()+3600);
    header('Location: index.php');
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
