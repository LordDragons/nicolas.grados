function bisextile(annee) {
    if ((annee % 4 === 0 && annee % 100 !== 0) || annee % 400 === 0) {
        return true;
    } else {
        return false;
    }
}


var anneeTest = 2024;
var resultat = bisextile(anneeTest);

console.log("L'année " + anneeTest + " est bisextile : " + resultat);


var anneeTest = 2025;
var resultat = bisextile(anneeTest);

console.log("L'année " + anneeTest + " est bisextile : " + resultat);