<?php

if (file_exists('./db/books')) {
    $all_books = unserialize(file_get_contents('./db/books'));
}
if (file_exists('./db/books') && $all_books) {
    foreach ($all_books as $book_name => $info) {
?>
    <link rel="stylesheet" type="text/css" href="stylesheets/articles.css">
    <div class='article'>
<?php
    $got_category = 0;
    echo "<br><b><font size=\"4\">" . ucfirst($info['title']) . "</font></b>";
    echo "<font size=\"3\"> - <i>" . $info['price'] . "</i> €</font><br>";
    if ($info['thriller'] == 1) {
        echo "Thriller<br>";
        $got_category = 1;
    }
    if ($info['sf'] == 1) {
        echo "Science-fiction<br>";
        $got_category = 1;
    }
    if ($info['novels'] == 1) {
        echo "Novels<br>";
        $got_category = 1;
    }
    if ($info['comics'] == 1) {
        echo "Comics<br>";
        $got_category = 1;
    }
    if ($got_category === 0)
        echo "<br>";
?>
    <img src="./img/book.png" />
    <form action="index.php" method="POST">
        <input type="number" name="quantity" min="1" max="100" value="1" /><br />
        <input type="submit" name="cart" value="Add to cart" /><br />
        <input type="hidden" name="title_to_add" value="<?php echo $info['title']; ?>" /></br>
        <input type="hidden" name="price" value="<?php echo $info['price']; ?>" /></br>
    </form>
    </div>
<?php
    }
}

?>
