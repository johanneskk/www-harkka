
var playState = {

  create: function() {

      this.score = 0;
      this.fuelmax= 210;

      background = game.add.sprite(0,0,"background");
      this.heli = game.add.sprite(1000,200,'figure');

      game.physics.arcade.enable(this.heli);
      this.heli.body.gravity.y = 800;

      this.pacmans = game.add.group();
      this.potions = game.add.group();

      background.x = 0;
      background.y = 0;
      background.height = game.height;
      background.width = game.width;
      background.inputEnabled = true;

      this.fuel = game.add.graphics(0, 0);

      this.fuel.lineStyle(20, 0x33FF00);
      this.fuel.moveTo(10,20);


      this.points = game.add.text(50, 50, "0",{ font: "45px Arial"});




    var spaceKey = game.input.keyboard.addKey(
                     Phaser.Keyboard.SPACEBAR);
    spaceKey.onDown.add(this.jump, this);



      this.timer = game.time.events.loop(1200, this.addPacman, this);

      this.fuelTimer = game.time.events.loop(1000,this.fuelDrain, this);


  },
  update: function() {
    if (this.heli.y < 0 || this.heli.y > 699)
          this.endGame();

    game.physics.arcade.overlap(
      this.heli, this.potions, this.hitPotion, null, this);

    game.physics.arcade.overlap(
      this.heli, this.pacmans, this.endGame, null, this);

      //this.fuelmax = this.fuelmax - 1;
      this.fuel.lineStyle(20, 0x33FF00);
      //this.fuel.moveTo(10,20);
      this.fuel.lineTo(this.fuelmax, 20);



  },
  jump: function() {
    this.heli.body.velocity.y = -350;
  },
  addPacman: function() {
    this.score += 1;
    this.points.text = this.score;
    var pacmanHeight = Math.floor((Math.random() * 620)+30);
    var pacman = game.add.sprite(-10,pacmanHeight,'pacman');
    game.physics.arcade.enable(pacman);


    pacman.height = 60;
    pacman.width = 60;

    pacman.body.velocity.x= 250;
    pacman.checkWorldBounds = true;
    pacman.outOfBoundsKill = true;

    this.pacmans.add(pacman);

    if ((Math.floor((Math.random() * 4) + 1)) === 2) {
      var pt1Height = Math.floor((Math.random() * 620)+30);
      var pt1 = game.add.sprite(70,pt1Height,'pt1');
      game.physics.arcade.enable(pt1);


      pt1.height = 50;
      pt1.width = 30;

      pt1.body.velocity.x= 250;
      pt1.checkWorldBounds = true;
      pt1.outOfBoundsKill = true;
      this.potions.add(pt1);
    }
  },


  endGame: function() {

    game.state.start('lose',true,false,this.score);
  },
  hitPotion: function(heli,potion) {

    this.score += 5;
    this.fuelmax += 20;

    this.points.text = this.score;
    potion.destroy();
  },
  fuelDrain: function(){
    this.fuel.destroy();
    this.fuel = game.add.graphics(0, 0);

    this.fuelmax -= 5;
    if(this.fuelmax <= 10) {
      this.endGame();
    }
    this.fuel.lineStyle(20, 0x33FF00);
    this.fuel.moveTo(10,20);
    this.fuel.lineTo(this.fuelmax, 20);

  }
};
