
function updateTable() {
    // Récupérer les utilisateurs depuis user.php
    fetch('user.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Mettre à jour le tableau HTML avec les nouvelles données
        const tableBody = document.getElementById('userTableBody');
        tableBody.innerHTML = '';

        data.forEach(user => {
            const row = tableBody.insertRow();
            row.insertCell().textContent = user.id;
            row.insertCell().textContent = user.nom;
            row.insertCell().textContent = user.prenom;
            row.insertCell().textContent = user.email;
        });
    })
    .catch(error => console.error('Erreur lors de la mise à jour du tableau :', error));

}

// Appeler updateTable() lors du chargement initial de la page
document.addEventListener('DOMContentLoaded', updateTable);
