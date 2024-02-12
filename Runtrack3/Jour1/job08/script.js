function sommenombrespremiers(nombre1, nombre2) {
    if (estNombrePremier(nombre1) && estNombrePremier(nombre2)) {
        return nombre1 + nombre2;
    } else {
        return false;
    }
}


function estNombrePremier(nombre) {
    if (nombre <= 1) return false;
    for (var i = 2; i <= Math.sqrt(nombre); i++) {
        if (nombre % i === 0) {
            return false;
        }
    }
    return true;
}

//Les vingt-cinq nombres premiers inférieurs à 100 sont : 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, et 97.


var nombre1 = 25;
var nombre2 = 32;
var resultat = sommenombrespremiers(nombre1, nombre2);

if (resultat !== false) {
    console.log("La somme des nombres premiers " + nombre1 + " et " + nombre2 + " est : " + resultat);
} else {
    console.log("Au moins l'un des nombres n'est pas premier. Le résultat est false.");
}


var nombre1 = 7;
var nombre2 = 11;
var resultat = sommenombrespremiers(nombre1, nombre2);

if (resultat !== false) {
    console.log("La somme des nombres premiers " + nombre1 + " et " + nombre2 + " est : " + resultat);
} else {
    console.log("Au moins l'un des nombres n'est pas premier. Le résultat est false.");
}