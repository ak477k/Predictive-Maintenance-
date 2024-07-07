<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Token</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Token</h2>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mycolleg_iot";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch current value from the database
            $result = $conn->query("SELECT Token,Valid_upto FROM API_KEY WHERE Folder='SmartPredictive' LIMIT 1");

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $currentValue = $row["Token"];
                $CurrentValidupto=$row["Valid_upto"];
            } else {
                $currentValue = "Not available";
            }

            $conn->close();
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="fieldValue">Current Secret Key:</label>
            <p><?php echo $currentValue; ?></p>
             <label for="fieldValue">Key Validation Date:</label>
            <p><?php echo $CurrentValidupto; ?></p>

            <label for="fieldValue">New Secret Key:</label>
            <input type="text" id="fieldValue" name="fieldValue" required>
            <button type="submit">Update</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $newValue = $_POST["fieldValue"];
            $sql = "UPDATE API_KEY SET Token = '$newValue' WHERE Folder='SmartPredictive'";

            if ($conn->query($sql) === TRUE) {
                echo "Field updated successfully";
            } else {
                echo "Error updating field: " . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
