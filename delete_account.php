<?php

if (isset($_POST['delete_account']) && isset($_POST['submit']) && $_POST['submit'] === "Goodbye") {
    if (!file_exists('./private/passwd')) {
        if (!file_exists('./private'))
            mkdir('./private');
        file_put_contents('./private/passwd', NULL);
    }
    $accounts = unserialize(file_get_contents('./private/passwd'));
    if ($accounts) {
        $there_and_correct = 0;
        foreach ($accounts as $user_id => $user_infos) {
            if ($user_infos['login'] === $_COOKIE['logged_on_user']) {
                $pwd = hash('sha3-512', $_POST['delete_account']);
                if ($user_infos['passwd'] == $pwd) {
                    unset($accounts[$user_id]);
                    $there_and_correct = 1;
                    setcookie("logged_on_user", null, time() - 3600);
                }
            }
        }
        if ($there_and_correct == 1) {
            file_put_contents('./private/passwd', serialize($accounts));
            echo "<script>alert(\"Your account has been deleted 🤗\")</script>";
            header('Refresh: 0; URL="index.php"');
        }
        else {
            echo "<script>alert(\"You typed in a wrong login or password 😥\")</script>";
            header('Refresh: 0; URL="manage_account.php"');
        }
    }
    else {
        echo "<script>alert(\"There is currently nobody registered on this website 🙃\")</script>";
        header('Refresh: 0; URL="manage_account.php"');
    }
}

?>
