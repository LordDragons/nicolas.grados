
function afficherjourssemaines() {
    // ***********************Tableau des jours de la semaine
    var jourssemaines = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];

    //*************Pour afficher les jours de la semaine
    for (var i = 0; i < jourssemaines.length; i++) {
        console.log("Jour " + (i + 1) + ": " + jourssemaines[i]);
    }
}

afficherjourssemaines();