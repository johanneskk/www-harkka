<?php
require_once("utils.php");

//File prints loginform and compares username and password to the usernames and passwords in database
//password is hashed

if(isset($_POST["username"]) && isset($_POST["password"])) {
    
    
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    
    

    $db = new PDO('mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password);

    $password = sha1($_POST["password"] . SALT);

    $stmt = $db->prepare("SELECT uid,username FROM users WHERE username = :username AND pwhash=:password");

    $stmt->execute(array(":username" => $_POST["username"], ":password" => $password));


    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //successful login
    if(count($rows) === 1) {

      $_SESSION["id"] = $rows[0]["uid"];
      $_SESSION["username"] = $rows[0]["username"];



      header("Location: index.php");
      exit;

    } else { //Unsuccessful login
        print "<p>Kirjautuminen ei onnistunut</p>";
    }


} else {


print<<<LOGINFORM

<form action = "index.php?p=login" method = "post">
<input class = "regForm" type= "text" name = "username" placeholder = "käyttäjänimi"/>
<input class = "regForm" type="password" name="password" placeholder="Salasana" />
<input class="button" type="submit" value="Kirjaudu" />

</form>
LOGINFORM;
};



 ?>
