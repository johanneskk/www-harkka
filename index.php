<?php
session_start();
require_once("utils.php");
siteHeader();

//Front controller
//directs user to the right .php file
//php files opens between siteHeader and siteFooter from utils.php

if (isset($_GET["p"])) {
  if ($_GET["p"] === "login") {
    require("login.php");
  } else if( $_GET["p"]=== "register") {
    require("register.php");
  }else if( $_GET["p"]=== "game" && isset($_SESSION["username"])) {
    ?>
    <script>
    //if width of window is higher than width of game tells user he needs higher resolution
    if ($(window).width() < 1201) {
      alert("tarvitset pelin pelaamiseen suuremman resoluution");
       window.location.replace("index.php");
    }
        </script>
        <?php
    require("game.php");
  }else if( $_GET["p"]=== "logout") {
    //resets current session
    unset($_SESSION["username"]);
    unset($_SESSION["id"]);

    header("Location: index.php");
    exit;
  }else if( $_GET["p"]=== "hiscores") {
    require("default.php");

  } else {
    require("default.php");
  }
}else {
  require("default.php");
}
siteFooter();
?>
