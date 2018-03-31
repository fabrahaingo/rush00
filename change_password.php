<?php

if (isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['newpw']) && isset($_POST['submit']) && $_POST['submit'] === "Modify") {
    if (!file_exists('./private/passwd')) {
        if (!file_exists('./private'))
            mkdir('./private');
        file_put_contents('./private/passwd', NULL);
    }
    $accounts = unserialize(file_get_contents('./private/passwd'));
    if ($accounts) {
        $there_and_correct = 0;
        foreach ($accounts as $user_id => $user_infos) {
            if ($user_infos['login'] === $_POST['login']) {
                $old = hash('sha3-512', $_POST['oldpw']);
                $new = hash('sha3-512', $_POST['newpw']);
                if ($user_infos['passwd'] == $old) {
                    $accounts[$user_id]['passwd'] = $new;
                    $there_and_correct = 1;
                    echo "<script>alert(\"Your password has been modified 🤗\")</script>";
                    header('Refresh: 0; URL="index.php"');
                }
            }
        }
        if ($there_and_correct == 1) {
            file_put_contents('./private/passwd', serialize($accounts));
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
