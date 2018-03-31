<?php

/* ===== Calculates total amount of items in cart ===== */
function price_cart($new_product_price) {
    if (isset($_SESSION['cart_amount']))
        $_SESSION['cart_amount'] += $new_product_price;
    else
        $_SESSION['cart_amount'] = $new_product_price;
    $formatted = sprintf("%1.2f", $_SESSION['cart_amount']) . "€";
    $_SESSION['product_price'] = 0;
    return ($formatted);
}

?>

<link rel="stylesheet" type="text/css" href="stylesheets/menu.css">
<nav class="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="godown"><a href="#">Categories <span class="arrow">&#9660;</span></a>
        <ul class="dropdown">
            <li><a href="index.php">All categories</a></li>
            <li><a href="#">Thrillers</a></li>
            <li><a href="#">Novels</a></li>
            <li><a href="#">Science fiction</a></li>
            <li><a href="#">Comics</a></li>
        </ul>
        <li><a href="#">Cart &nbsp;&nbsp;
        <?php
            echo isset($_SESSION['cart_amount']) ? "(" . price_cart($_SESSION['product_price']) . ")" : "(<i>empty</i>)";
        ?>
    </a></li>
    </li>
  </ul>
</nav>
