const express = require("express");
const path = require("path");

const app = express();
const port = 3000;

// Read CSS as a static file
// from the 'public' directory
app.use(express.static(path.join(__dirname, "public")));

// route to access HTML page
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "index.html"));
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
