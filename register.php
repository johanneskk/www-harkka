<?php
require_once("utils.php");

//Prints register form and check user inputs

//first checks if username and passwords are set
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])) {

//checks 2 passwords match
  if($_POST["password"] === $_POST["password2"]) {

    //password have to contain big letters, small letters and numbers
      if(preg_match( '~[A-Z]~', $_POST["password"]) &&
      preg_match( '~[a-z]~', $_POST["password"]) &&
      preg_match( '~\d~', $_POST["password"]) &&
      (strlen( $_POST["password"]) > 7) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
        //length of password have to be over 7 characters and it cant contain any special characters

      //if inputs are ok checks if database contains same username
       $servername = getenv('IP');
       $username = getenv('C9_USER');
       $password = "";
       $database = "c9";
       $dbport = 3306;
  
    
    

      $db = new PDO('mysql:host=127.0.0.1;dbname=c9;charset=utf8', $username, $password);
      

      $password = sha1($_POST["password"] . SALT);
      $stmt = $db->prepare("SELECT username FROM users WHERE username = :username");

      $stmt->execute(array(":username" => $_POST["username"]));

      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) === 1) {

        print "<p>Käyttäjänimi on jo olemassa.</p>";

      } else {
        if(!isset($_POST["adminbox"])) {
          $stmt = $db->prepare("INSERT INTO users(username, pwhash) VALUES(:f1, :f2)");
  
          $stmt->execute(array(":f1" => $_POST["username"], ":f2" => $password));


      }else {
        $stmt = $db->prepare("INSERT INTO users(username, pwhash,isAdmin) VALUES(:f1, :f2, 1)");

        $stmt->execute(array(":f1" => $_POST["username"], ":f2" => $password));
      }
        print "<p>Käyttäjätili luotu.</p>";

      }

    } else {
      print "<p>Salasana ei ole tarpeeksi vahva. (täytyy sisältää pieniä ja isoja kirjaimia sekä vähintään yhden numeron)</p>";
    }
  } else{
    print "<p>Salasanat eivät täsmää!</p>";

  }

} else {

//prints register form
print<<<REGISTERFORM

<form action = "index.php?p=register" method = "post">
<input class = "regForm" type= "text" name = "username" placeholder = "käyttäjänimi"/>
<input class = "regForm" type="password" name="password" placeholder="Salasana" />
<input class = "regForm" type="password" name="password2" placeholder="Salasana uudestaan" />

<br/>
<input class = "button" id="register" type="submit" value="Rekisteröidy" />

</form>
REGISTERFORM;
};


 ?>
