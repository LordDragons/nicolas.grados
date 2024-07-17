//une carte des clefs autorisées
var allowedKeys = {
    37: 'left',
    38: 'up',
    39: 'right',
    40: 'down',
    65: 'a',
    66: 'b'
  };
  
  // Code officiel Konami
  var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];
  
  // une variable pour mémoriser la position que l'utilisateur a atteinte jusqu'à présent.
  var konamiCodePosition = 0;
  

  document.addEventListener('keydown', function(e) {
    // obtenir la valeur du code clef à partir de la carte clef
    var key = allowedKeys[e.keyCode];
    // obtenir la valeur de la clef requise à partir du code konami
    var requiredKey = konamiCode[konamiCodePosition];
  
    // comparer la clef avec la clef requise
    if (key == requiredKey) {
  
      // passer à la touche suivante dans la séquence de codes Konami
      konamiCodePosition++;
  
      //si la dernière clef est atteinte, activez les cheats
      if (konamiCodePosition == konamiCode.length) {
        activateCheats();
        konamiCodePosition = 0;
      }
    } else {
      konamiCodePosition = 0;
    };


});

function activateCheats() {
    alert("cheats activated");
    document.body.classList.add('konami');
  }
/*Le code Konami est un célèbre cheat code utilisé dans de nombreux jeux vidéo. 
Il a été popularisé par le jeu Contra sur la console NES. Voici le code Konami :
↑↑↓↓←→←→BA
Lorsque les joueurs saisissent ce code pendant le jeu, ils obtiennent généralement des avantages 
tels que des vies supplémentaires, des munitions illimitées ou d’autres bonus. 
C’est un clin d’œil nostalgique pour les amateurs de jeux rétro ! 🎮✨*/