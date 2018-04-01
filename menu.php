<?php

/* ===== Calculates total amount of items in cart ===== */
function price_cart($new_product_price) {
    $_SESSION['cart_amount'] += $new_product_price;
    if ($_SESSION['cart_amount'] !== 0)
        $formatted = sprintf("%1.2f", $_SESSION['cart_amount']) . "€";
    else
        $formatted = "<i>empty</i>";
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
            <li><a href="index.php?category=All">All categories</a></li>
            <li><a href="index.php?category=Thrillers">Thrillers</a></li>
            <li><a href="index.php?category=Novels">Novels</a></li>
            <li><a href="index.php?category=Sf">Science fiction</a></li>
            <li><a href="index.php?category=Comics">Comics</a></li>
        </ul>
        <li><a href="cart.php">Cart &nbsp;&nbsp;
        <?php
            echo (isset($_SESSION['cart_amount'])) ? "(" . price_cart($_SESSION['product_price']) . ")" : "(<i>empty</i>)";
        ?>
    </a></li>
    </li>
  </ul>
</nav>
