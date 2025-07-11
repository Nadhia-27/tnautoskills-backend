<?php
// Enable error display for development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to Neon PostgreSQL
$conn = pg_connect("host=ep-lingering-scene-a8s5rpo2-pooler.eastus2.azure.neon.tech dbname=neondb user=neondb_owner password=npg_dPkt2AmE1UjD sslmode=require");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Collect form data
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$education = $_POST['education'];
$district = $_POST['district'];

// Insert into DB
$query = "INSERT INTO registrations (name, mobile, email, education, district) 
          VALUES ($1, $2, $3, $4, $5)";
$result = pg_query_params($conn, $query, [$name, $mobile, $email, $education, $district]);

if ($result) {
    echo "Thank you! Your registration has been submitted.";
} else {
    echo "Error: " . pg_last_error($conn);
}

pg_close($conn);
?>