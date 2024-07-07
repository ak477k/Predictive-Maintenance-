<?php

$sname= "localhost";

$unmae= "id21330445_smartcart";

$password = "Man@1234";

$db_name = "id21330445_iotproject";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

