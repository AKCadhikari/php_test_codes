<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phno']);
    $address = htmlspecialchars($_POST['address']);

    // Check if file was uploaded without errors
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $file_name = $_FILES['cv']['name'];
        $file_tmp = $_FILES['cv']['tmp_name'];
        $file_type = $_FILES['cv']['type'];
        $file_size = $_FILES['cv']['size'];

        // Move the uploaded file to a directory of your choice
        $destination = "uploads/" . basename($file_name);
        if (move_uploaded_file($file_tmp, $destination)) {
            echo "File uploaded successfully.<br>";
        } else {
            echo "Error uploading file.<br>";
        }
    } else {
        echo "No file uploaded or error during upload.<br>";
    }

    // Display the collected data
    echo "<h2>Submitted Information</h2>";
    echo "Name: $name<br>";
    echo "Phone Number: $phone<br>";
    echo "Address: $address<br>";
    echo "Uploaded CV: $file_name<br>";
} else {
    echo "No data submitted.";
}
?>
