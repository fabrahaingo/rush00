<?php

header('Location: index.php');
setcookie("logged_on_user", "", time()-3600);

?>
