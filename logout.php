<?php

header('Refresh: 0; URL=' . $_SERVER['HTTP_REFERER']);
setcookie("logged_on_user", "", time()-3600);

?>
