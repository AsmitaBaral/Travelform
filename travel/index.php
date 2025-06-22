<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "travel";
// Create connection
$con = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection to this database failed due to: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize form inputs
    $name = mysqli_real_escape_string($con, $_POST['name'] ?? '');
    $age = mysqli_real_escape_string($con, $_POST['age'] ?? '');
    $gender = mysqli_real_escape_string($con, $_POST['gender'] ?? '');
    $email = mysqli_real_escape_string($con, $_POST['email'] ?? '');
    $phone = mysqli_real_escape_string($con, $_POST['phone'] ?? '');
    $other = mysqli_real_escape_string($con, $_POST['other'] ?? '');

    // Prepare SQL query
    $sql = "INSERT INTO `trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `other`, `date/time`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "✅ Successfully inserted the record!";
    } else {
        echo "❌ Error inserting record: " . mysqli_error($con);
    }

    // Optional: echo SQL for debugging
    // echo $sql;
}

// Close connection
mysqli_close($con);
?>
