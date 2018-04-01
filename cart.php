<?php include ('session_start.php'); ?>
<?php

/* ===== Empty the cart ===== */
if (isset($_POST['empty_cart']) && $_POST['empty_cart'] === "Empty") {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
}
/* ===== Place order ===== */
else if (isset($_POST['place_order']) && $_POST['place_order'] === "Place your order" && isset($_COOKIE['logged_on_user'])) {
    echo "<script>alert(\"Your order has been placed successfuly ! Thanks for your trust 😃 !\"); </script>";
    $orders = unserialize(file_get_contents('./db/archives'));
// echo "$orders";
    if ($orders == 'empty')
    {
        $orders[$_COOKIE['logged_on_user']] = $_SESSION;
    } else {
      echo "helloeeee ELSE";
      $orders[$_COOKIE['logged_on_user']] = $_SESSION;
    }
    print_r($orders);
    print_r($_SESSION);
    file_put_contents('./db/archives', serialize($orders));
    session_destroy();
    // header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);
}
else if (isset($_POST['place_order']) && $_POST['place_order'] === "Place your order") {
    echo "<script>alert(\"You must be logged in to place your order, please come back when you are 😉\"); </script>";
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
        <?php include ('cart_page.php'); ?>
        <?php include ('footer.php'); ?>

</body>
<html>
