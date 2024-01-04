const express = require('express');
const sql = require('mssql');

const app = express();
const port = process.env.PORT || 2455;

// Connection configuration
const config = {
  user: 'amirkhalid',
  password: 'Freya1212',
  server: 'little-wing-server.database.windows.net',
  database: 'little-wing-db',
  options: {
    encrypt: true,
    trustServerCertificate: false,
  },
};

// API endpoint to get data
app.get('/api/data', async (req, res) => {
  try {
    // Connect to the database
    const pool = await sql.connect(config);

    // Query the database
    const result = await pool.request().query('SELECT * FROM Students');

    // Send the result as JSON
    res.json(result.recordset);
  } catch (error) {
    console.error('Error fetching data:', error.message);
    res.status(500).json({ error: 'Internal Server Error' });
  } finally {
    // Close the database connection
    await sql.close();
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
