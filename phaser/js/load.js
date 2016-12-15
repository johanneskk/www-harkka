var loadState = {

  preload: function() {
    game.load.image("figure","phaser/assets/helicol.png");
    game.load.image("background","phaser/assets/background.jpg");
    game.load.image("pacman","phaser/assets/pacman.png");
    game.load.image("pt1","phaser/assets/pt1.png");
    game.load.image("pt2","phaser/assets/pt2.png");

    game.input.mouse.capture =true;
  },
  create: function() {
    game.state.start('menu');
  }
};
