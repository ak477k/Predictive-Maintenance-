<?php
// Define the target folder and file
$targetFolder = 'login'; // Replace 'folder_name' with the actual folder name
$targetFile = 'index.php';

// Construct the full URL
$redirectTo = "$targetFolder/$targetFile";

// Perform the redirect
header("Location: $redirectTo");
exit;
?>
