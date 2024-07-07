<?php

       $dbhost = 'localhost';                // db host
	   $dbuser = 'mycolleg_iot';            // my sql user name
	   $dbpass = 'wNxXVesHJ5MadPRvK5au';            // db password
	   $dbname = "mycolleg_iot";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
		$query = "SELECT * FROM predictive2";
		if (!$result = mysqli_query($conn, $query)) {
		    exit(mysqli_error($con));
		}
		 
		$users = array();
		if (mysqli_num_rows($result) > 0) {
		    while ($row = mysqli_fetch_assoc($result)) {
		        $users[] = $row;
		    }
		}
		 
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=predictive.csv');
		$output = fopen('php://output', 'w');
		fputcsv($output, array('ID', 'TEMPERATURE', 'HUMIDITY','VIBRATION MAGNITUDE','UPDATED_ON'));
		 
		if (count($users) > 0) {
		    foreach ($users as $row) {
		        fputcsv($output, $row);
		    }
		}
?>