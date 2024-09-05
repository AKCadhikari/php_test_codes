<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit CV</title>
</head>
<body>
    <h1>Submit Your CV</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phno">Phone Number:</label><br>
        <input type="text" id="phno" name="phno" required><br><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="4" cols="50" required></textarea><br><br>

        <label for="cv">Upload CV:</label><br>
        <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx,.txt" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
