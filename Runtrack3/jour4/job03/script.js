document.getElementById('filtrer').addEventListener('click', filterData);

function filterData() {
  const id = document.getElementById('id').value;
  const name = document.getElementById('name').value;
  const type1 = document.getElementById('type1').value;
  const type2 = document.getElementById('type2').value;

  fetch('pokemon.json')
    .then(response => {
      if (!response.ok) {
        throw new Error('Pas de réponse!');
      }
      return response.json();
    })
    .then(data => {
      const filteredData = data.filter(item => {
        const frenchName = item.name['french']; // Accéder au nom français
        return (id === '' || String(item.id).includes(id)) &&
               (name === '' || containsLanguage(item.name, name)) &&
               (type1 === '' || item.type.includes(type1) || item.type.includes(type2));
      });

      displayFilteredData(filteredData);
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

function containsLanguage(nameObject, targetLanguage) {
  if (typeof nameObject === 'string') {
    return nameObject.includes(targetLanguage);
  }

  // En supposant que nameObject est un objet avec des clefs de langue
  const languageKeys = Object.keys(nameObject);
  return languageKeys.some(key => nameObject[key].includes(targetLanguage));
}

function displayFilteredData(filteredData) {
  const resultDiv = document.getElementById('result');
  resultDiv.innerHTML = '';

  if (filteredData.length === 0) {
    resultDiv.innerText = 'Aucune correspondance trouvée.';
    return;
  }

  const ul = document.createElement('ul');
  filteredData.forEach(item => {
    const li = document.createElement('li');
    const frenchName = item.name['french']; // Accéder au nom français
    li.textContent = `ID: ${item.id}, Nom: ${frenchName}, Type: ${item.type}`;
    ul.appendChild(li);
  });

  resultDiv.appendChild(ul);
}
