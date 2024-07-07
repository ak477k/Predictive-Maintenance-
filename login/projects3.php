<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
  

    <meta http-equiv="refresh" content="5">    
   <title>Smart Trash</title>
   <style>
   
   body
   {  
    
    background-color: powderblue;
    
    background-size: 50% 20%;
    background-repeat: no-repeat;
    background-position: center;
    margin-bottom: 100px;
  
    
   }
  
h1 
{
    text-align: center;
      color: RED;
}

h2
{
 text-align: center;
color: blue;
}

table {
            width: 80%;
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
}
</style>

  </head>

  


<?php      // start php script
// ********************************************database connection *****************************************************  
 	   $dbhost = 'localhost';                // db host
	   $dbuser = 'id21330445_smartcart';            // my sql user name
	   $dbpass = 'Man@1234';            // db password
	   $dbname = "id21330445_iotproject";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	   
	   if(! $conn ) 
	   {
		  die('Could not connect: ' . mysqli_error());//mysqli_connect_error()onnection not established the generate erro
	   }
 	//   echo 'Database Connection successful.<br> ';              // messege for connection successful
  // ****************************************database access*************************************     
     
       $sql = "SELECT * from Dustbin order by id";     // access sql      
      // mysqli_select_db('iot_appliances' );                 // myiot1 is user name of selected database
	  $retval =mysqli_query( $conn,$sql );
       
       if(! $retval) 
       {
		  die('Could not enter data: ' . mysqli_connect_error());
	   }
       else
  //      		echo 'Table Retrieval successful.<br> ';
       		
 // ************************display/ show***************************       		
   
       echo " <h1>PROJECT:SMART TRASH CART </h1> ";
       echo "<h2> <center>COLLEGE:SGT UNIVERSITY </center></h2>";
	   echo "<table border='1'>";
       echo "<tr><th>ID</th><th>DISTANCE</th><th>MESSAGE</th><th>CHECK HISTORY</th></tr>";
       while($row = mysqli_fetch_assoc($retval))
        {  
            echo "<tr>";
            echo "<td style='vertical-align: middle; text-align: center;'>{$row['ID']}</td>";
            echo "<td style='vertical-align: middle; text-align: center;'>{$row['distance']}</td>";
           
            echo "<td style='vertical-align: middle; text-align: center;'>{$row['message']}</td>";
            // echo "<td style='vertical-align: middle; text-align: center;'><a href='{$row['URL']}' target='_blank'>Click Here</a></td>";
             echo "<td><button onclick=\"window.open('{$row['URL']}', '_blank')\">Open Link</button></td>";
            echo "</tr>";
         
   		}
   		
   		echo "</table>";
        
        mysqli_close($conn);

?>
<!-- <center><h2>Developed by: <br>  </h2></center> -->

</body>
<Center><a class="btn-success" href="quiz.html" target="_blank">Play Online Quiz</a></center>

</html>