<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="xepOnline.jqPlugin.js"></script>
<?php
session_start();


//checks if user is logged in and gets scores from database and prints them as a plain text
//without any css

if (isset($_SESSION["id"])) {
  
  $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    
    

    


  $db  = new PDO('mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password) or die("cannot open the database");

    $stmt = $db->prepare("SELECT scores.score,users.username  FROM scores LEFT JOIN users on scores.uid = users.uid order by scores.score desc LIMIT 10");
    $stmt ->execute();


  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


  echo '<div id = "Usage"><h1>Hall Of Fame</h1>';
  foreach ($rows as $row){

          echo '<p>',$row['username'],'---------',$row['score'],'</p>';

      }

      echo '</div>';
      echo '<button id="toPdf">Lataa PDF</button>';

    } else {
      echo'<p id="loginNote">Sinun täytyy kirjautua sisään käyttääksesi sovellusta.</p>';

    }
    echo '<button id="back">Takaisin</button>';

    ?>

    <script>
    //clickbuttons "back" and "download pdf" functionalities
    
    $('#back').click(function () {
        window.location.replace("index.php");
    });
      $('#toPdf').click(function () {
          printMe();
      });

      function printMe() {
          xepOnline.Formatter.Format('Usage', {render:"download"});
      }
    </script>
