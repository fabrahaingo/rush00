<?php

/* ===== Each book category has its one and only price ===== */
if (isset($_POST['cart']) && $_POST['cart'] === "Add to cart") {
    if (!isset($_SESSION['cart_amount']))
        // $_SESSION['cart_amount'] = 0;
        $books = unserialize(file_get_contents('./db/books'));
        // print_r($books);
        $_SESSION['product_price'] = ($books[$_POST['title_to_add']]['price'] * $_POST['quantity']);
    // header('Location: ' . $_SERVER['PHP_SELF']);
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
      <input type="hidden" name="title_to_add" value="fanfan la tulipe" /><br />
      <div class='price'>quantity<br>
      <input type='number'min="1" name='quantity' value='1' placeholder="" required/></div>
      <input type="submit" name="cart" value="Add to cart" /><br />
    </form>
    <form action="index.php" method="POST">
        <input type="submit" name="empty_cart" value="Empty" />
    </form>

</body>
<html>
