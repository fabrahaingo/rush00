<?php

if (file_exists('./db/books')) {
    $all_books = unserialize(file_get_contents('./db/books'));
}
if (file_exists('./db/books') && $all_books && isset($_SESSION['cart_amount']) && $_SESSION['cart_amount'] !== 0) {
    $got_item = 0;
    foreach ($all_books as $book_name => $info) {
?>
    <link rel="stylesheet" type="text/css" href="stylesheets/cart.css">
    <div class='cart_item'>
<?php
/* ===== If the amount of products in the cart is > 0, then display it ===== */
    if (isset($_SESSION[$book_name]['quantity']) && $_SESSION[$book_name]['quantity'] !== 0) { /* ===== TO FIX : display of books for which the title is a number ===== */
        $got_item = 1;
        echo "<br><b><font size=\"4\">" . ucfirst($book_name) . "</font></b>";
        echo "<font size=\"3\"> - Quantity: <i>" . $_SESSION[$book_name]['quantity'] . "</i></font><br>";
        echo "<font size=\"2\">Total for this item - <i>" . ($_SESSION[$book_name]['price'] * $_SESSION[$book_name]['quantity']) . "</i> €</font><br>";
?>
    <form action="cart.php" method="POST">
        <input type="number" name="quantity_add" min="1" max="100" value="1" />
        <input type="submit" name="add" value="Add to cart" /><br />
        <input type="number" name="quantity_del" min="1" max="<?php echo $_SESSION[$book_name]['quantity'] ?>" value="1" />
        <input type="submit" name="del" value="Remove from cart" /><br />
        <input type="hidden" name="title_item" value="<?php echo $info['title']; ?>" /></br>
        <input type="hidden" name="price" value="<?php echo $info['price']; ?>" /></br>
    </form>
    </div>
<?php
        }
    }
/* ===== At the end, if the cart is not empty, display option to empty, the total amount, and a "Place your order" button ===== */
    if (isset($_SESSION['cart_amount'])) {
?>
    <p>Total: <?php echo $_SESSION['cart_amount']; ?> €</p>
    <form action="cart.php" method="POST">
        <input type="submit" name="place_order" value="Place your order" />
    </form>
    <form action="cart.php" method="POST">
        <input type="submit" name="empty_cart" value="Empty" />
    </form>
<?php
    }
    if ($got_item === 0)
        echo ("Your cart is currently empty");
}
else {
    echo("Your cart is currently empty");
}

?>
