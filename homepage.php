<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="homecss.css">
</head>
<style>
    td,th{
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }
    tr:nth-child(even)
    {
        background-color: #dddddd;
    }
</style>
<body>
    <header>
        <a href="#">Blood Bank</a>
        <nav>
            <ul class="nav-links">
                <li><a href="HomePage.html" class="active">Home</a></li>
                <li><a href="Request_Page.html">Request Blood</a></li>
                <li><a href="Donation_Form.html">Donoate Blood</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="action">Logout</a>
    </header>
    <img src="blood-donor-landing-page-free-vector.jpg" width="1500px">
    <div class="container">
    <section class="one">
        <h3>Donors answer questions about their medical history, lifestyle habits, and travel history to identify any potential risks.</h3>
    </section>
    <section class="two">
        <h2># One unit of donated blood can save up to three lives.</h2>

           <h2># You can donate blood every three months. It only takes 48 hours for your body fluids to be completely replenished.</h2> 

          <h2># Scientists have estimated the volume of blood in the human body to be eight percent of body weight.</h2>
            
          <h2># There are 100,000 miles of blood vessels in an adult human body.</h2>
            <h2># A red blood cell can make a complete circuit of your body in 30 seconds.</h2>
    </section>

    <section class="three">
        <h2>Third</h2>
    </section>

    <section class="Four">
        <h2>Forth</h2>
    </section>
    </div>




    <center>
        <h1>About Donation</h1></center>
        <p>The average human body contains about five liters of blood, which is made of several cellular and non-cellular components such as Red blood cell, Platelet, and Plasma.

            Each type of component has its unique properties and can be used for different indications. The donated blood is separated into these components by the blood centre and one donated unit can save upto four lives depending on the number of components separated from your blood.
        </p>
        <h3>Process</h3>
    <p>Blood Collected straight from the donor into a blood bag and mixed with an anticoagulant is called as whole blood. This collected whole blood is then centrifuged and red cell, platelets and plasma are separated. The separated Red cells are mixed with a preservative to be called as packed red blood cells.</p>
    <h3>Who can donate?</h3>
        <p>You need to be 18-65 years old, weight 45kg or more and be fit and healthy.</p>
    <h3>Lasts For?</h3>
        <p>Red cells can be stored for 42 days at 2-6 degree celsius.</p>
    
        <h3>How long does it take to donate?</h3>
        <p>15-30 minutes to donate.including the pre-donation check-up.</p>
        
        <h3>How often can I donate?</h3>
        <p>Male donors can donate again after 90 days and female donors can donate again after 120 days.</p>







    <center>
    <table>
            <h1>Compatible Blood Type Donors</h1>
        <tr>
            <td>Blood Type</td>
            <td>Donate Blood To</td>
            <td>Receive Blood From</td>
        </tr>
        <tr>
            <td>A+</td>
            <td>A+ AB+</td>
            <td>A+ A- O+ O-</td>
        </tr>
        <tr>
            <td>AB+</td>
            <td>AB+</td>
            <td>Everyone</td>
        </tr>
        <tr>
            <td>O+</td>
            <td>O+ A+ B+ AB+</td>
            <td>O+ O-</td>
        </tr>
        <tr>
            <td>B+</td>
            <td> B+ AB+</td>
            <td>B+ B- O+ O-</td>
        </tr>
        <tr>
            <td>A-</td>
            <td>A+ A- AB+ AB-</td>
            <td>A- O-</td>
        </tr>
        <tr>
            <td>B-</td>
            <td>B+ B- AB+ AB-</td>
            <td>B- O-</td>
        </tr>
        <tr>
            <td>O-</td>
            <td>Everyone</td>
            <td>O-</td>
        </tr>
        <tr>
            <td>AB-</td>
            <td> AB- AB+</td>
            <td>AB- A- B- O-</td>
        </tr>
    </table>
    </center>

</body>
