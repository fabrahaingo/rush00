<?php

if (file_exists('./db/books')) {
    $all_books = unserialize(file_get_contents('./db/books'));
}
if (file_exists('./db/books') && $all_books) {
    $got_item = 0;
    foreach ($all_books as $book_name => $info) {
?>
    <link rel="stylesheet" type="text/css" href="stylesheets/cart.css">
    <div class='cart_item'>
<?php
    if (isset($_SESSION[$book_name]['quantity'])) {
        $got_item = 1;
        echo "<br><b><font size=\"4\">" . ucfirst($book_name) . "</font></b>";
        echo "<font size=\"3\"> - Quantity: <i>" . $_SESSION[$book_name]['quantity'] . "</i></font><br>";
        echo "<font size=\"3\"> - <i>" . ($_SESSION[$book_name]['price'] * $_SESSION[$book_name]['quantity']) . "</i> €</font><br>";
?>
    <form action="cart.php" method="POST">
        <input type="number" name="quantity" min="1" max="100" value="1" /><br />
        <input type="submit" name="cart" value="Add to cart" /><br />
        <input type="submit" name="empty_cart" value="Empty" />
        <input type="hidden" name="title_to_remove" value="<?php echo $info['title']; ?>" /></br>
        <input type="hidden" name="price" value="<?php echo $info['price']; ?>" /></br>
    </form>
    </div>
<?php
        }
    }
    if ($got_item === 0)
        echo ("Your cart is currently empty");
}

?>
