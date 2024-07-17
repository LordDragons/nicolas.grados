function tri(numbers, order) {
    if (order === "asc") {
        // Tri dans l'ordre ascendant
        for (var i = 0; i < numbers.length - 1; i++) {
            for (var j = 0; j < numbers.length - i - 1; j++) {
                if (numbers[j] > numbers[j + 1]) {
                    // Échange les éléments si ils sont dans le mauvais ordre
                    var temp = numbers[j];
                    numbers[j] = numbers[j + 1];
                    numbers[j + 1] = temp;
                }
            }
        }
    } else if (order === "desc") {
        // Tri dans l'ordre décroissant
        for (var i = 0; i < numbers.length - 1; i++) {
            for (var j = 0; j < numbers.length - i - 1; j++) {
                if (numbers[j] < numbers[j + 1]) {
                    // Échange les éléments si ils sont dans le mauvais ordre
                    var temp = numbers[j];
                    numbers[j] = numbers[j + 1];
                    numbers[j + 1] = temp;
                }
            }
        }
    }

    return numbers;
}


    // Utiliser la fonction tri avec un tableau de nombres et un ordre
    var numbers = [5, 2, 8, 1, 9, 3];
    
    // Tri ascendant
    var triAscendant = tri([...numbers], "asc");
    console.log("Tri ascendant:", triAscendant);

    // Tri descendant
    var triDescendant = tri([...numbers], "desc");
    console.log("Tri descendant:", triDescendant);