
<?php
       $dbhost = 'localhost';                // db host
	   $dbuser = 'root';            // my sql user name
	   $dbpass = '';            // db password
	   $dbname = "mycolleg_iot";
	   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

if(isset($_GET['TEMP'])  AND isset($_GET['HUMIDITY']) AND isset($_GET['Magnitude']) AND isset($_GET['token'])  )
   {                       
			              
     $key =  $_GET['token'];
     $checkres =mysqli_query($conn,"select Valid_upto from API_KEY where Token= '$key' ");
		 if(mysqli_num_rows($checkres)>0)
		 {
       
			   $checkrow =mysqli_fetch_assoc($checkres);
			   
			   if($checkrow['Valid_upto'] >= date("Y-m-d"))
			  
			   {          
			       
			       //$temp_s2 =  $_GET['distance'];
			            
			 //            if($temp_s2 < '5')
			 //                  { 
			 //               		 $to = "theneerajjha@gmail.com";
    //                                  $subject = "DUSTBIN ALERT!!!";
    //                                  $message = "Dear User Please note DUSTBIN IS FULL Thank You";
    //                                  $header = "From:theneerajjha@gmail.com \r\n";
    //                                 //  $header .= "MIME-Version: 1.0\r\n";
    //                                 //   $header .= "Content-type: text/html\r\n";
         
    //                                 //  $retval = mail ($to,$subject,$message,$header);
    //                                  $retval = mail ($to,$subject,$message);
                                     
    //                                  if( $retval == true ) 
    //                                  {
    //                                     echo "Message sent successfully...";
    //                                  }
    //                                  else
    //                                  {
    //                                     echo "Message could not be sent...";
    //                                   }
			 //                  }
			                date_default_timezone_set('Asia/Kolkata');
                            $currentISTTimestamp = date('Y-m-d H:i:s');
			            
						   $temp_s1 =  $_GET['TEMP'];
						   $temp_s2 =  $_GET['HUMIDITY'];
						   $temp_s3 =  $_GET['Magnitude'];
						   
						   $sql = "INSERT INTO predictive2 (TEMPERATURE,HUMIDITY,Magnitude,updated_on) VALUES ('$temp_s1','$temp_s2','$temp_s3',' $currentISTTimestamp')";
						   
						   $sql2="update predictive set TEMPERATURE='$temp_s1', HUMIDITY=' $temp_s2',Magnitude='$temp_s3' where id ='1' ";
						   $retval = mysqli_query(  $conn,$sql );
						    $retval = mysqli_query(  $conn,$sql2 );
						   echo "Data Inserted Successfully";  
						  
				 }
						   
					   
			  else
			    {
				  echo "API KEY Has been Deactivated Please Check with Admin";
				}
					   
					   
		       }
		else
		{
		   echo "Please provide valid API Key";
		}
		  
	}
			   
   
 else
	 {
		 echo "Please provide token along with Mandatory data";
	 
	 }
   
 ?>