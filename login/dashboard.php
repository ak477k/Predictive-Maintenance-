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
    <title>Welcome Page</title>
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
                <h2>Predictive analysis in industries involves leveraging historical data and statistical algorithms to forecast future trends, outcomes, or events. It aids in optimizing operations, reducing downtime, minimizing risks, and enhancing decision-making across various sectors such as finance, healthcare, and manufacturing.</p>

    <h2>Key Components:</h2>

    <ol>
        <li><strong>NodeMCU:</strong> NodeMCU is the brain of the system, serving as the central microcontroller responsible for data processing, sensor interfacing, and communication with the IoT platform.</li>
        <li><strong>Gyroscope Sensors: </strong> Gyroscope sensors are employed to measure the rotational motion and orientation of the machinery. These sensors provide precise data regarding the vibration levels experienced by the equipment.</li>
        <li><strong>Temperature Sensor: </strong> A temperature sensor is a device that measures the temperature of its surroundings and converts it into a numerical value, typically in degrees Celsius or Fahrenheit, for monitoring and control purposes.</li>
        <li><strong>IoT Platform:</strong> The system is connected to an IoT platform that enables real-time monitoring and control over the internet. This connectivity allows farmers to remotely access and manage the farm parameters.</li>
        
    </ol>

    
    
     <img src="Predictive.jpg" alt="Smart predictive" width="650" height="350">
    
                    </div>
                  <!-- body -->
                </div>
            </div>
        </div>
    </div>

    <!-- Your JavaScript and other body content go here -->
</body>

</html>
