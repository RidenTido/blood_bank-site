<?php
// Start the session to store user login status if needed
session_start();

// Dummy data for demonstration (replace this with actual database query)
$users = [
    ['email' => '', 'password' => ''],
    // Add more user data as needed
];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the input (this can be expanded as per your needs)
    if (empty($email) || empty($password)) {
        echo "Please fill in both email and password.";
    } else {
        // Loop through dummy users to check credentials
        $loginSuccess = false;
        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                $loginSuccess = true;
                break;
            }
        }

        // If login is successful, redirect to a dashboard or home page
        if ($loginSuccess) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("Location: dashboard.php"); // Redirect to dashboard (you can replace this with any page)
            exit();
        } else {
            echo "Invalid email or password.";
        }
    }
}
?>
