<?php

// Check if the request method is POST and files are uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["files"])) {
    $targetDir = "uploads/"; // Destination folder where files will be moved
    $uploadOk = 1; // Variable to track the success of file upload
    $messages = []; // Array to store the alert messages

    // Database connection configuration
    $servername = "localhost"; // Change to your server name
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $database = "cudhonew"; // Change to your database name

    // Create a new database connection
    $conn = new mysqli($servername, $username, '', $database);

    // Check if the database connection is successful
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Get the highest ID value from the database
    // $sql = "SELECT MAX(id) AS max_id FROM tbl_images";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    // $nextId = $row["max_id"] + 1;
    // Retrieve the head_id from the form submission
    $headId = $_POST["head_id"];
    $userId = $_POST["user_id"];

    // Iterate over each uploaded file
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $fileName = $_FILES["files"]["name"][$key];
        $targetFile = $targetDir . basename($fileName);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($tmp_name);
        if ($check === false) {
            $messages[] = "File is not an image: $fileName";
            $uploadOk = 0;
            continue; // Skip to the next file
        }

        // Check if the file already exists
        if (file_exists($targetFile)) {
            $messages[] = "Sorry, the file already exists: $fileName";
            $uploadOk = 0;
            continue; // Skip to the next file
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($tmp_name, $targetFile)) {
            $messages[] = "The file $fileName has been uploaded.";

            // Insert the file ID and path into the database
            $filePath = $targetFile;
            $sql = "INSERT INTO tbl_image (imagePath,head_id,user_id) VALUES ( '$filePath', '$headId', '$userId')";
            if ($conn->query($sql)) {
                $messages[] = "Database entry created for $fileName.";
            } else {
                $messages[] = "Error creating database entry for $fileName: " . $conn->error;
            }
        } else {
            $messages[] = "Sorry, there was an error uploading the file: $fileName";
            $uploadOk = 0;
        }
    }

    // Close the database connection
    $conn->close();

    // Generate the JavaScript alert containing all the messages
    $alertMessage = implode("\n", $messages);
    echo $alertMessage;

    // if ($uploadOk == 0) {
    //     echo 'Some files were not uploaded.';
    // } else {
    //     echo 'All files have been uploaded successfully.';
    // }
}
?>