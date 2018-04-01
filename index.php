<?php include ('session_start.php'); ?>
<?php

/* ===== Each book category has its one and only price ===== */
if (isset($_POST['cart']) && $_POST['cart'] === "Add to cart") {
    if (!(isset($_SESSION['cart_amount'])))
        $_SESSION['cart_amount'] = 0;
    $_SESSION['product_price'] = ($_POST['price'] * $_POST['quantity']);
/* ===== PRICE OF CART ARTICLE ===== */
    if (!isset($_SESSION[$_POST['title_to_add']]))
        $_SESSION[$_POST['title_to_add']]['price'] = $_POST[$_SESSION['product_price']];
/* ===== QUANTITY OF CART ARTICLE ===== */
/* ===== If the item is already in the cart, increase its quantity ===== */
    if (isset($_SESSION[$_POST['title_to_add']]['quantity']))
        $_SESSION[$_POST['title_to_add']]['quantity'] = $_POST['quantity'];
    else
        $_SESSION[$_POST['title_to_add']]['quantity'] += $_POST['quantity'];
    header('Location: ' . $_SERVER['PHP_SELF']);
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
        <?php include ('main_page.php'); ?>
        <?php include ('footer.php'); ?>

</body>
<html>
