// Contenu du fichier script.js
function jourtravaille(date) {
    var joursFeries2020 = ["2020-01-01", "2020-04-10", "2020-05-01", "2020-05-08", "2020-05-21", "2020-06-01", "2020-07-14", "2020-08-15", "2020-11-01", "2020-11-11", "2020-12-25"];

    var dateStr = date.toLocaleDateString('fr-FR');

    var jour = date.getDate();
    var mois = date.getMonth() + 1; // Les mois sont indexés de 0 à 11, donc on ajoute 1
    var annee = date.getFullYear();

    var dateString = jour + " " + mois + " " + annee;

    if (joursFeries2020.includes(date.toISOString().split('T')[0])) {
        console.log("Le " + dateString + " est un jour férié.");
    } else if (date.getDay() === 0 || date.getDay() === 6) {
        console.log("Non, " + dateStr + " est un week-end.");
    } else {
        console.log("Oui, " + dateStr + " est un jour travaillé.");
    }
}

var dateExemple = new Date("2020-02-28");
jourtravaille(dateExemple);
