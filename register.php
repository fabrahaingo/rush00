<?php

if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']) && $_POST['submit'] === "Register") {
    if (!file_exists('./private/passwd')) {
        mkdir('./private');
        file_put_contents('./private/passwd', NULL);
    }
    $accounts = unserialize(file_get_contents('./private/passwd'));
    $there = 0;
    if ($accounts) {
        foreach ($accounts as $user_id => $user_infos) {
            if ($user_infos['login'] === trim($_POST['login'])) {
                echo "<script>alert(\"This login is already taken 😞 Please choose another one\");</script>";
                header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);
                $there = 1;
            }
        }
    }
    if ($there == 0) {
        $newuser['login'] = $_POST['login'];
        $newuser['passwd'] = hash('sha3-512', $_POST['passwd']);
        print(hash('sha3-512', $_POST['passwd']));
        print_r($_POST);
        $accounts[] = $newuser;
        file_put_contents('./private/passwd', serialize($accounts));
        echo "<script>alert(\"Account successfuly created 😃\");</script>";
        setcookie("logged_on_user", $_POST['login'], time() + 3600);
        // header('Refresh: 0; URL="index.php"');
    }
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
