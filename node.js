const express = require('express');
const sql = require('mssql');

const app = express();
const port = process.env.PORT || 3000;

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

    // Send the result as an HTML table
    const tableHtml = result.recordset.map(row => {
      return `<tr><td>${row.StudentID}</td><td>${row.FirstName}</td><td>${row.LastName}</td></tr>`;
    });

    res.send(`
      <html>
        <head>
          <style>
            table {
              border-collapse: collapse;
              width: 100%;
            }
            th, td {
              border: 1px solid #ddd;
              padding: 8px;
              text-align: left;
            }
          </style>
        </head>
        <body>
          <h2>Data from Students Table</h2>
          <table>
            <tr>
              <th>Student ID</th>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>
            ${tableHtml.join('')}
          </table>
        </body>
      </html>
    `);
  } catch (error) {
    console.error('Error fetching data:', error.message);
    res.status(500).send('Internal Server Error');
  } finally {
    // Close the database connection
    await sql.close();
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
