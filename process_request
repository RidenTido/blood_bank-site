<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "blood_bank"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $blood_type = $_POST['blood_type'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];

    $sql = "INSERT INTO blood_requests (name, contact, blood_type, quantity, location) 
            VALUES ('$name', '$contact', '$blood_type', '$quantity', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "Blood request submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

header("Location: show_donors.php"); // Redirect to the donor list page
exit();
?>
