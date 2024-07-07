<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (empty($_SESSION['uid'])) {
    header('location: logout.php');
} else {
    $uid = $_SESSION['uid'];
    $query = "SELECT FullName FROM tbluser WHERE ID = '$uid'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $name = $row['FullName'];
    } else {
        // Handle database query error here
        $name = "Unknown User";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>contact</title>
    <style>
        /* Body and Page Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .page-wrapper {
            background-color: #fff;
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        /* Navigation Bar Styles */
        .navbar {
            background-color: lightblue;
            overflow: hidden;
            color:black;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar li {
            float: left;
        }

        .navbar li a {
            display: block;
            color: black;
            font-weight: bold;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar li a:hover {
            background-color: #555;
        }

        /* Card Styles */
        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .contact-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .contact-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .contact-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .contact-form input[type="text"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .contact-form input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .contact-form input[type="submit"]:hover {
            background-color: #555;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        /* Welcome Message Styles */
        .welcome-message {
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        /* Logout Button Styles */
        .btn-logout {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        /* .content {
            color: #333;
            font-size: 16px;
            margin-top: 20px;
        } */
        .content {
                color: black;
                font-size: 16px;
                /* margin-top: 10px; */
                background-color: #f2f2f2; /* Background color */
                padding: 20px; /* Add some padding for better readability */
            }
        /* Style the headings and paragraphs within the content */
        .content h2 {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        .content p {
            margin-bottom: 10px;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info h2 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        .contact-info-item {
            margin-top: 20px;
        }

        .contact-info-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .contact-info-item p {
            font-size: 16px;
            margin: 0;
        }



    </style>

</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <!-- <nav class="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="projects.php">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <h3 style="color: blue; text-align: center;">Welcome, <?php echo $name; ?>!</h3>
                </ul>
            </nav> -->
            <?php include('navbar.php'); ?>
            <div class="card card-1">
                <div class="card-body">
                <div class="content">
                <!-- <div class="contact-form">
           <center> <h2>Contact Form</h2></center>
            <form action="contact_process.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div> -->
        <div class="contact-info">
                <h2>Contact Us</h2>
                <div class="contact-info-item">
                    <h3>Shikha</h3>
                    <p>Roll No: 2021UCS1531</p>
                    <p>Email:shikha.ug21@nsut.ac.in </p>
                    <p>Mobile No:+918377936691</p>
                    
                </div>
                <div class="contact-info-item">
                    <h3>Isha</h3>
                    <p>Roll No: 2021UCS1552</p>
                    <p>Email:isha.ug21@nsut.ac.in</p>
                    <p>Mobile No:+917827608282</p>
                </div>
                <div class="contact-info-item">
                    <h3>Ananya Kapoor</h3>
                    <p>Roll No: 2021UCS1573</p>
                    <p>Email:ananya.kapoor.ug21@nsut.ac.in</p>
                    <p>Mobile No:+917827608282</p>
                </div>
            </div>

    </div>
    <footer>
        &copy; 2024 Netaji Subhas University of Technology
    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- Your JavaScript and other body content go here -->
</body>

</html>
