function jsonValueKey(jsonString, key) {
    try {
      const parsedJson = JSON.parse(jsonString);
      
      if (parsedJson.hasOwnProperty(key)) {
        return parsedJson[key];
      } else {
        return "Clé non trouvée";
      }
    } catch (error) {
      return "Erreur de parsing JSON";
    }
  }
  
  // ******************************Exemple d'utilisation :
  const jsonString = '{"name": "La Plateforme_", "address": "8 rue d\'hozier", "city": "Marseille", "nb_staff": "11", "creation": "2019"}';
  const key = 'city';
  
  const result = jsonValueKey(jsonString, key);

// *******************Cela devrait afficher "Marseille"
  
  console.log(result); 