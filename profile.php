<?php
// Start the session
session_start();

// Database connection parameters
$host = 'localhost';
$dbname = 'blood_bank';
$user = 'root';
$password = '123';

// Connect to the database
$conn = mysql_connect($host, $user, $password);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

// Select the database
mysql_select_db($dbname, $conn);

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];

    // Define the query to retrieve user details
    $query = "SELECT * FROM users WHERE id = " . intval($loggedInUserId);

    // Execute the query
    $result = mysql_query($query);
    if (!$result) {
        die('Query failed: ' . mysql_error());
    }

    // Fetch the user details
    $userDetails = mysql_fetch_assoc($result);

    // Display the user details and calculate age
    if ($userDetails) {
        $dob = $userDetails['dob']; // Assuming 'dob' is the column name for Date of Birth
        $dobDateTime = new DateTime($dob);
        $currentDateTime = new DateTime();
        $age = $dobDateTime->diff($currentDateTime)->y;

        $username = htmlspecialchars($userDetails['username']);
        $email = htmlspecialchars($userDetails['email']);
        $gender = htmlspecialchars($userDetails['gender']);
        $contact = htmlspecialchars($userDetails['contact']);
    } else {
        echo 'No user found with the specified ID.';
        exit;
    }
} else {
    echo 'No user is logged in.';
    exit;
}

// Close the database connection
mysql_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Donation.css">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e74c3c;
            padding: 10px 20px;
            color: #fff;
        }
        header a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
        }
        .nav-links {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 0;
        }
        .nav-links li {
            display: inline;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 80px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #444;
        }
        .profile-info {
            margin: 20px 0;
            text-align: left;
        }
        .profile-info p {
            font-size: 18px;
            margin: 10px 0;
        }
        .profile-info strong {
            color: #555;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <header>
        <a href="#">Blood Bank</a>
        <nav>
            <ul class="nav-links">
                <li><a href="HomePage.html">Home</a></li>
                <li><a href="Request_Page.html">Request Blood</a></li>
                <li><a href="Donation_Form.html">Donate Blood</a></li>
                <li><a href="profile.html" class="active">Profile</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="action">Logout</a>
    </header>
    <div class="container">
        <h2>Profile Details</h2>
        <div class="profile-info">
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Contact:</strong> <?php echo $contact; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Age:</strong> <?php echo $age; ?> years</p>
        </div>
        <div class="btn-container">
            <a class="logout-btn" href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
