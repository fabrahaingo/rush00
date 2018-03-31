<?php include ('session_start.php'); ?>
<?php

/* ===== Each book category has its one and only price ===== */
if (isset($_POST['thrillers']) && $_POST['thrillers'] === "Add to cart") {
    if (!isset($_SESSION['cart_amount']))
        $_SESSION['cart_amount'] = 0;
    $_SESSION['product_price'] = 5.2;
    header('Location: ' . $_SERVER['PHP_SELF']);
}
if (isset($_POST['novels']) && $_POST['novels'] === "Add to cart") {
    if (!isset($_SESSION['cart_amount']))
        $_SESSION['cart_amount'] = 0;
    $_SESSION['product_price'] = 4.6;
    header('Location: ' . $_SERVER['PHP_SELF']);
}
if (isset($_POST['sf']) && $_POST['sf'] === "Add to cart") {
    if (!isset($_SESSION['cart_amount']))
        $_SESSION['cart_amount'] = 0;
    $_SESSION['product_price'] = 2.8;
    header('Location: ' . $_SERVER['PHP_SELF']);
}
if (isset($_POST['comics']) && $_POST['comics'] === "Add to cart") {
    if (!isset($_SESSION['cart_amount']))
        $_SESSION['cart_amount'] = 0;
    $_SESSION['product_price'] = 7.5;
    header('Location: ' . $_SERVER['PHP_SELF']);
}

/* ===== Empty the cart ===== */
if (isset($_POST['empty_cart']) && $_POST['empty_cart'] === "Empty") {
    $_SESSION['cart_amount'] = null;
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
    <form action="index.php" method="POST">
        Thrillers
        <input type="submit" name="thrillers" value="Add to cart" /><br />
        Novels
        <input type="submit" name="novels" value="Add to cart" /><br />
        Science-fiction
        <input type="submit" name="sf" value="Add to cart" /><br />
        Comics
        <input type="submit" name="comics" value="Add to cart" /><br />
        <input type="submit" name="empty_cart" value="Empty" />
    </form>

</body>
<html>
