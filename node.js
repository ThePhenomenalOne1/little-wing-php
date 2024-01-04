const sql = require('mssql');

// Connection configuration
const config = {
   user: 'amirkhalid',
    password: 'Freya1212',
    server: 'little-wing-server.database.windows.net',
    database: 'little-wing-db',
  options: {
    encrypt: true, // For Azure SQL, you should enable encryption
    trustServerCertificate: false // Change to true if your server uses a self-signed certificate
  }
};

// Connect to the database
sql.connect(config)
  .then(pool => {
    console.log('Connected to the database');

    // Query database
    return pool.request().query('SELECT * FROM Students');
  })
  .then(result => {
    console.log(result.recordset);
  })
  .catch(err => {
    console.error('Error connecting to the database:', err);
  });
