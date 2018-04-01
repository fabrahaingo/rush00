<?php include ('session_start.php'); ?>
<?php

/* ===== Empty the cart ===== */
if (isset($_POST['empty_cart']) && $_POST['empty_cart'] === "Empty") {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
}

/* ===== Place order/ buy ===== */
else if (isset($_POST['place_order']) && $_POST['place_order'] === "Place your order" && isset($_COOKIE['logged_on_user'])) {
    echo "<script>alert(\"Your order has been placed successfuly ! Thanks for your trust 😃 !\"); </script>";
/* ===== When order is places, serializes the informations in a seperate file so this admin can access them ===== */
    $orders = unserialize(file_get_contents('./db/archives'));
    $books = unserialize(file_get_contents('./db/books'));
    foreach ($books as $key_title => $value) {
      if ((isset($_SESSION[$key_title])))
      {
          if (!(isset($orders[$_COOKIE['logged_on_user']][$key_title]['quantity'])))
                $orders[$_COOKIE['logged_on_user']][$key_title] = 0;
          $orders[$_COOKIE['logged_on_user']][$key_title] += $_SESSION[$key_title]['quantity'];
      }
    }
    file_put_contents('./db/archives', serialize($orders));
    session_destroy();
    header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);
}

/* ===== If the user is not logged in, then it shows an error message ===== */
else if (isset($_POST['place_order']) && $_POST['place_order'] === "Place your order") {
    echo "<script>alert(\"You must be logged in to place your order, please come back when you are 😉\"); </script>";
    header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);
}

/* ===== If the user wants to increase the number of items of his cart + changes the value CART_AMOUNT in $_SESSION ==== */
else if (isset($_POST['quantity_add']) && isset($_POST['add']) && $_POST['add'] === "Add to cart") {
    $_SESSION[$_POST['title_item']]['quantity'] = ($_SESSION[$_POST['title_item']]['quantity'] + $_POST['quantity_add']);
    $_SESSION['cart_amount'] += ($_POST['quantity_add'] * $_SESSION[$_POST['title_item']]['price']);
    header('Refresh: 0; URL=' . $_SERVER['PHP_SELF']);
}

/* ===== If the user wants to decrease the number of items of his cart + changes the value CART_AMOUNT in $_SESSION ==== */
else if (isset($_POST['quantity_del']) && isset($_POST['del']) && $_POST['del'] === "Remove from cart") {
    $_SESSION[$_POST['title_item']]['quantity'] = ($_SESSION[$_POST['title_item']]['quantity'] - $_POST['quantity_del']);
    $_SESSION['cart_amount'] -= ($_POST['quantity_del'] * $_SESSION[$_POST['title_item']]['price']);
    if ($_SESSION[$_POST['title_item']]['quantity'] < 1) {
        unset($_SESSION[$_POST['title_item']]);
    }
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
