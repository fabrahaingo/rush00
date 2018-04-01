<?php

function init_db()
{
    if (!(file_exists("./db")))
        mkdir("./db");
    if (!(file_exists("./private")))
        mkdir("./private");

    if (!(file_exists("./private/passwd")))
    {
        $account = array();
        $account[] = array("login" => "fabien", "passwd" => hash("sha3-512", "rahaingo"));
        file_put_contents("./private/passwd", serialize($account));
    }
    if (!(file_exists("./db/books")))
    {
        $books = 'a:9:{s:16:"fanfan la tulipe";a:6:{s:5:"title";s:16:"fanfan la tulipe";s:5:"price";s:2:"12";s:8:"thriller";s:1:"1";s:2:"sf";s:1:"0";s:6:"novels";s:1:"0";s:6:"comics";s:1:"0";}s:17:"salut les copains";a:6:{s:5:"title";s:17:"salut les copains";s:5:"price";s:5:"10000";s:8:"thriller";s:1:"0";s:2:"sf";s:1:"1";s:6:"novels";s:1:"1";s:6:"comics";s:1:"0";}s:25:"Comment se faire des amis";a:6:{s:5:"title";s:25:"Comment se faire des amis";s:5:"price";s:1:"2";s:8:"thriller";s:1:"0";s:2:"sf";s:1:"1";s:6:"novels";s:1:"0";s:6:"comics";s:1:"1";}s:16:"je suis une keke";a:6:{s:5:"title";s:16:"je suis une keke";s:5:"price";s:1:"3";s:8:"thriller";s:1:"0";s:2:"sf";s:1:"1";s:6:"novels";s:1:"0";s:6:"comics";s:1:"1";}s:18:"Martine a la plage";a:6:{s:5:"title";s:18:"Martine a la plage";s:5:"price";s:2:"13";s:8:"thriller";s:1:"0";s:2:"sf";s:1:"1";s:6:"novels";s:1:"0";s:6:"comics";s:1:"0";}s:27:"Denver le dernier dinausore";a:6:{s:5:"title";s:27:"Denver le dernier dinausore";s:5:"price";s:3:"360";s:8:"thriller";s:1:"0";s:2:"sf";s:1:"0";s:6:"novels";s:1:"1";s:6:"comics";s:1:"0";}s:14:"Gaston Lagaffe";a:6:{s:5:"title";s:14:"Gaston Lagaffe";s:5:"price";s:2:"23";s:8:"thriller";s:1:"1";s:2:"sf";s:1:"0";s:6:"novels";s:1:"0";s:6:"comics";s:1:"0";}s:19:"Je dirais meme plus";a:6:{s:5:"title";s:19:"Je dirais meme plus";s:5:"price";s:2:"59";s:8:"thriller";s:1:"0";s:2:"sf";s:1:"0";s:6:"novels";s:1:"0";s:6:"comics";s:1:"1";}s:4:"zero";a:6:{s:5:"title";s:4:"zero";s:5:"price";s:3:"453";s:8:"thriller";s:1:"1";s:2:"sf";s:1:"0";s:6:"novels";s:1:"0";s:6:"comics";s:1:"1";}}';
        file_put_contents("./db/books", $books);
    }
    if (!(file_exists("./db/archives")))
    {
        file_put_contents("./db/archives", 'empty');
    }
    setcookie("is_installed", 1, (time() + 3600));
    header('Location:index.php');
}
?>
