
window.fbAsyncInit = function() {
FB.init({
  appId      : '398575003807452',
  xfbml      : true,
  version    : 'v2.8'
});


FB.getLoginStatus(function(response) {
  if(response.status === 'connected') {
    document.getElementById('status').innerHTML = "Yhdistetty Facebookiin.";
    $("#status").css('color', 'green');

  } else if(response.status === 'not_authorized') {
    document.getElementById('status').innerHTML = "Appia ei varmennettu Facebookissa.";
        $("#status").css('color', 'red');

  } else {
    document.getElementById('status').innerHTML = "Et ole kirjautunut facebookkiin";
          $("#status").css('color', 'red');

  }
});

};


(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

var loseState = {
  init: function(score) {
    this.playerScore = score;




  },

  create: function() {

    var x = this.playerScore;
    game.stage.backgroundColor = '#71c5cf';
    game.add.text(300,200, "HÄVISIT, SAIT " + this.playerScore + " PISTETTÄ!",{ font: "45px Arial"});


    var request = $.ajax({
      url: "handler.php",
      type: "post",
      data: {
        "score":x
      },
      dataType:"html"
    });
    //gets status about login and prints current status on navibar
    var startLabel = game.add.text(300,300, "Aloita uusi peli painamalla W",{ font: "45px Arial"});
    FB.getLoginStatus(function(response) {
      if(response.status === 'connected') {

        document.getElementById('status').innerHTML = "Yhdistetty Facebookiin.";
        startLabel1  = game.add.text(180,400, "Julkaise pisteet facebookissa painamalla Y",{ font: "45px Arial"});
              $("#status").css('color', 'green');

      } else if(response.status === 'not_authorized') {
        document.getElementById('status').innerHTML = "Appia ei varmennettu Facebookissa.";
        startLabel1 =  game.add.text(270,400, "Kirjaudu facebookkiin painamalla Y",{ font: "45px Arial"});
                $("#status").css('color', 'red');

      } else {
        document.getElementById('status').innerHTML = "Et ole kirjautunut facebookkiin";

        startLabel1 =  game.add.text(270,400, "Kirjaudu facebookkiin painamalla Y",{ font: "45px Arial"});
                $("#status").css('color', 'red');

      }

    });


    var WKey = game.input.keyboard.addKey(
                       Phaser.KeyCode.W);
      WKey.onDown.addOnce(this.continue, this);

    var YKey = game.input.keyboard.addKey(
                         Phaser.KeyCode.Y);
        YKey.onDown.addOnce(this.fb, this);

  },

  continue: function() {

    game.state.start('play');

},
  fb: function() {
    FB.login(function(response) {
      if(response.status === 'connected') {
        document.getElementById('status').innerHTML = "Yhdistetty Facebookkiin.";
        $("#status").css('color', 'green');
      } else if(response.status === 'not_authorized') {
        document.getElementById('status').innerHTML = "Appia ei varmennettu Facebookissa.";
      } else {
        document.getElementById('status').innerHTML = "Et ole kirjautunut Facebookiin.";
      }
    }, {scope: 'publish_actions'});

    FB.api('/me/feed', 'post', {message: 'Sain helikopteripelissä '+ this.playerScore +' pistettä!'}, function(response){
    });
}
};
