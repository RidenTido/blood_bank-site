<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "blood_bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT username, email, contact, gender, dob FROM users WHERE id = $user_id";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Calculate age
    $dob = new DateTime($user['dob']);
    $currentDate = new DateTime();
    $age = $currentDate->diff($dob)->y;
} else {
    echo "User details not found.";
    exit();
}

$conn->close();
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
                <li><a href="profile.php" class="active">Profile</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="action">Logout</a>
    </header>
    <div class="container">
        <h2>Profile Details</h2>
        <div class="profile-info">
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Contact:</strong> <?php echo htmlspecialchars($user['contact']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
            <p><strong>Age:</strong> <?php echo $age; ?> years</p>
        </div>
        <div class="btn-container">
            <a class="logout-btn" href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
