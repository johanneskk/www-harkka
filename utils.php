<?php


//utils.php has 2 functions containing the html code of header and footer

define("SALT","asdasddf");
function siteHeader() {

  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset ="utf-8">
    <title>Phaser harkkatyö</title>

    <link rel="stylesheet" type="text/css" href="sheet.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
      <script src="xepOnline.jqPlugin.js"></script>

  </head>

  <body>

    <nav>
    <ul class = "navibar">
      <?php
      //if user has logged in the program prints different navigation bar

      if (!isset($_SESSION["username"])) {
        echo '<li><a href="index.php?p=login">Kirjaudu</a></li>';
        echo '<li><a href="index.php?p=register">Rekisteröidy</a></li>';

      }else {
        echo '<li id= "naviGame"><a href="index.php?p=game">Pelaa</a></li>';
        echo '<li><a href="index.php?p=hiscores">Hall Of Fame</a></li>';
        echo '<li><a href="index.php?p=logout">Kirjaudu ulos</a></li>';
      }
      echo '<li id="status" class="red"></li>';

      ?>
    </ul>

    </nav>


    <?php

  }




  function siteFooter() {
    ?>
  
  </body>
  </html>
    <?php
  }

?>
