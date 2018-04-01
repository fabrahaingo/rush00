<?php

session_start();
include ('install.php');
if (!isset($_COOKIE['is_installed']))
    init_db();

?>
