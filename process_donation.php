<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<div style='color: red; font-weight: bold;'>Connection failed: " . $conn->connect_error . "</div>");
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $blood_type = $_POST['blood_type'];
    $dob = $_POST['dob'];
    $location = $_POST['location'];

    // Insert data into the database
    $sql = "INSERT INTO donors (name, contact, blood_type, dob, location) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisss", $name, $contact, $blood_type, $dob, $location);

    if ($stmt->execute()) {
        echo "<div style='background-color: #d1e7dd; color: #0f5132; padding: 20px; border: 2px solid #badbcc; border-radius: 8px; margin: 20px 0; font-family: Arial, sans-serif;'>
                <h2 style='margin: 0; font-size: 24px;'>🎉 Thank You for Registering!</h2>
                <p style='margin: 10px 0; font-size: 16px;'>Your decision to donate blood is a selfless act of kindness. By registering, you join a community of heroes dedicated to saving lives.</p>
                <p style='margin: 10px 0; font-size: 16px;'>Our team will reach out to you soon with details about upcoming donation events and opportunities to make an impact.</p>
                <p style='margin: 10px 0; font-size: 14px; color: #6c757d;'>Donating blood is a small act that can create big changes.</p>
              </div>";
    } else {
        echo "<div style='background-color: #f8d7da; color: #842029; padding: 20px; border: 2px solid #f5c2c7; border-radius: 8px; margin: 20px 0; font-family: Arial, sans-serif;'>
                <h2 style='margin: 0; font-size: 24px;'>🚫 Oops! Something Went Wrong</h2>
                <p style='margin: 10px 0; font-size: 16px;'>We couldn’t register your information due to a technical error. Please try again later or contact our support team for assistance.</p>
                <p style='margin: 10px 0; font-size: 14px;'>Error details: " . $stmt->error . "</p>
              </div>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<div style='background-color: #f8d7da; color: #842029; padding: 20px; border: 2px solid #f5c2c7; border-radius: 8px; margin: 20px 0; font-family: Arial, sans-serif;'>
            <h2 style='margin: 0; font-size: 24px;'>⚠️ Invalid Request</h2>
            <p style='margin: 10px 0; font-size: 16px;'>It seems there was an issue with your form submission. Please ensure all fields are correctly filled and try again.</p>
          </div>";
}
?>
