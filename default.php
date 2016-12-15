<?php

require_once("utils.php");

//checks if user has logged in
if (isset($_SESSION["id"])) {

//opens connection to the database

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    
    

  

  $db  = new PDO('mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password) or die("cannot open the database");

  //query to the database, gets 10 highest scores ordered from highest to smallest.
    $stmt = $db->prepare("SELECT scores.score,users.username  FROM scores LEFT JOIN users on scores.uid = users.uid order by scores.score desc LIMIT 10");
    $stmt ->execute();



  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //prints scores to the website

echo '<table id="hofTable"><tbody>';
  foreach ($rows as $row){
      echo "<tr>";
      echo '<td class = "item"><span  style = "text-align:left;">',$row['username'],'</span><span class = "right">',$row['score'],'</span></td>';
      echo "</tr>";
  }
  echo '</tr></table></tbody>';
  echo '<button id="print_one">Print style and pdf</button>';

//  echo '<a href="#" onclick="return xepOnline.Formatter.Format("Usage",{render:"download"});">asdasd</a>';
} else {
  echo'<p id="loginNote">Sinun täytyy kirjautua sisään käyttääksesi sovellusta.</p>';

}
//if clicked from "print_one"-button goes to page containing only raw text of highscores
?>
<script>
$('#print_one').click(function () {
  window.location.replace("printpdf.php");

});

</script>
