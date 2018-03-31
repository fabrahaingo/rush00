<?php

function auth($login, $passwd) {
    if ($login && $passwd) {
        $accounts = unserialize(file_get_contents('./private/passwd'));
        foreach ($accounts as $user_id => $user_infos) {
            if ($user_infos['login'] === $login) {
                $hashed = hash('sha3-512', $passwd);
                if ($user_infos['passwd'] == $hashed)
                    return (TRUE);
                else
                {
                    return (FALSE);
                  }
            }
        }
        return (FALSE);
    }
    else
        return (FALSE);
}

?>
