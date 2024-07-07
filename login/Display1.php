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
    <meta http-equiv="refresh" content="10">
    <title>Predictive</title>
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
        
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-success {
            display: block;
            width: 200px;
            margin: 10px auto;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-success1 {
            display: block;
            width: 200px;
            margin: 10px auto;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-success1:hover {
            background-color: #0056b3;
        }


h3 {
    text-align: center;
color: Green;
     

}

 @media (max-width: 768px) {
            h1, h2, h3, p {
                font-size: 16px; /* Adjust the font size for smaller screens */
            }

            table {
                width: 100%; /* Make the table full width on smaller screens */
            }

            .btn-success,
            .btn-success1 {
                width: 100%; /* Make buttons full width on smaller screens */
            }
        }

 button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
p
{
 color:blueviolet;
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
               <?php      // start php script
// ********************************************database connection *****************************************************  
       $dbhost = 'localhost';                // db host
	   $dbuser = 'root';            // my sql user name
	   $dbpass = '';            // db password
	   $dbname = "mycolleg_iot";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	   
	   if(! $conn ) 
	   {
		  die('Could not connect: ' . mysqli_error());//mysqli_connect_error()onnection not established the generate erro
	   }
 	//   echo 'Database Connection successful.<br> ';              // messege for connection successful
  // ****************************************database access*************************************     
     
       $sql = "SELECT * from predictive2";     // access sql      
      // mysqli_select_db('iot_appliances' );                 // myiot1 is user name of selected database
	  $retval =mysqli_query( $conn,$sql );
       
       if(! $retval) 
       {
		  die('Could not enter data: ' . mysqli_connect_error());
	   }
       else
  //      		echo 'Table Retrieval successful.<br> ';
       		
 // ************************display/ show***************************       		
   

 echo "<table border='1'>";
 echo "<tr><th>ID</th><th>TEMPERATURE</th><th>HUMIDITY</th><th>VIBRATION</th><th>TIME</th></tr>";
 while ($row = mysqli_fetch_assoc($retval)) {
     echo "<tr";
     if ($row['Magnitude'] > 15) {
         echo " style='background-color: #ffcccc;'"; // Set background color to light red
     }
     echo ">";
     echo "<td style='vertical-align: middle; text-align: center;'>{$row['ID']}</td>";
     echo "<td style='vertical-align: middle; text-align: center;'>{$row['TEMPERATURE']}</td>";
     echo "<td style='vertical-align: middle; text-align: center;'>{$row['HUMIDITY']}</td>";
     echo "<td style='vertical-align: middle; text-align: center;'>{$row['Magnitude']}</td>";
     echo "<td style='vertical-align: middle; text-align: center;'>{$row['updated_on']}</td>";
     echo "</tr>";
 }
 echo "</table>"; 
        mysqli_close($conn);

?> 
<Center><a class="btn-success" href="backup.php" target="_blank">Export to CSV</a></center>
<Center><a class="btn-success" href="projects.php">Exit</a></center>
                    </div>
                  <!-- body -->
                </div>
            </div>
        </div>
    </div>
    

    <!-- Your JavaScript and other body content go here -->
</body>

</html>
