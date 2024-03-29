const { createServer } = require("node:http");

const hostname = "0.0.0.0";
const port = 3000;

const server = createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader("Content-Type", "text/plain");
  res.end("Hello World");
});
/* on écoute sur le port 3000 et on bind sur 0.0.0.0 
    pour que le service soit accessible depuis l'extérieur du container
*/
server.listen(port, hostname);