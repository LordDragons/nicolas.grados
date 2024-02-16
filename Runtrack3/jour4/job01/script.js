document.getElementById('button').addEventListener('click', fetchData);

function fetchData() {
  fetch('expression.txt')
    .then(response => {
      if (!response.ok) {
        throw new Error("La réponse n'est pas correct");
      }
      return response.text();
    })
    .then(data => {
      document.getElementById('result').innerText = data;
    })
    .catch(error => {
      console.error('Error:', error);
    });
}
