var menuState = {

  create: function() {
  
    game.stage.backgroundColor = '#71c5cf';
    var nameLabel = game.add.text(370,250, "Tervetuloa pelaamaan!",{ font: "45px Arial"});
    var startLabel = game.add.text(220,350, "Aloita pelaaminen painamalla välilyöntiä",{ font: "45px Arial"});

    var spaceKey = game.input.keyboard.addKey(
                       Phaser.Keyboard.SPACEBAR);
      spaceKey.onDown.addOnce(this.start, this);
  },
  start: function () {

    game.state.start('play');
  }


};
