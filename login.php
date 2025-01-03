<?php
// Database connection
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "blood_bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize input
    $email = $conn->real_escape_string($email);

    // Query to check if user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to homepage
            header("Location: homepage.php");
            exit(); // Always call exit after header redirect to stop further script execution
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with this email.";
    }
}

$conn->close();
?>
