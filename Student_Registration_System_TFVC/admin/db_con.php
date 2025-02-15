<?php
define('DBHOST', 'localhost'); // Hostname, typically 'localhost'
define('DBUSER', 'root');      // MySQL username, typically 'root' for local development
define('DBPASS', '');          // MySQL password, usually empty for local XAMPP installations
define('DBNAME', 'student');   // The name of your database

// Establish a connection to the database
$db_con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Check if the connection failed
if (!$db_con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>