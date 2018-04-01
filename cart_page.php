<?php

if (file_exists('./db/books')) {
    $all_books = unserialize(file_get_contents('./db/books'));
}
?>
    <div class="whole_cart">
<?php
if (file_exists('./db/books') && $all_books && isset($_SESSION['cart_amount']) && $_SESSION['cart_amount'] !== 0) {
    $got_item = 0;
    foreach ($all_books as $book_name => $info) {
?>
    <link rel="stylesheet" type="text/css" href="stylesheets/cart.css">
<?php
/* ===== If the amount of products in the cart is > 0, then display it ===== */
    if (isset($_SESSION[$book_name]['quantity']) && $_SESSION[$book_name]['quantity'] !== 0) {
        $got_item = 1;
?>
    <div class='cart_item'>
<?php
        echo "<br><b><font size=\"4\">" . ucfirst($book_name) . "</font></b>";
        echo "<font size=\"3\"> - Quantity: <i>" . $_SESSION[$book_name]['quantity'] . "</i></font><br>";
        echo "<font size=\"2\">Total for this item - <i>" . ($_SESSION[$book_name]['price'] * $_SESSION[$book_name]['quantity']) . "</i> €</font><br>";
?>
    <form action="cart.php" method="POST">
        <input type="number" name="quantity" min="1" max="100" value="1" /><br />
        <input type="submit" name="cart" value="Add to cart" /><br />
        <input type="hidden" name="title_to_remove" value="<?php echo $info['title']; ?>" /></br>
        <input type="hidden" name="price" value="<?php echo $info['price']; ?>" /></br>
    </form>
    </div>
<?php
        }
    }
?>
    </div>
<?php
/* ===== At the end, if the cart is not empty, display option to empty, the total amount, and a "Place your order" button ===== */
    if (isset($_SESSION['cart_amount'])) {
?>
<div class="total">
    <p class="price">Total: <?php echo $_SESSION['cart_amount']; ?> €</p>
    <form action="cart.php" method="POST">
        <input class="place_order" type="submit" name="place_order" value="Place your order" />
    </form>
    <form action="cart.php" method="POST">
        <input class="empty" type="submit" name="empty_cart" value="Empty" />
    </form>
    <br />
</div>
<?php
    }
    if ($got_item === 0)
        echo ("Your cart is currently empty");
}

?>
