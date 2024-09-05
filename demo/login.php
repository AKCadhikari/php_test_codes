<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']); 
    $pass = validate($_POST['password']);

    if(empty($uname)){
        header("Location: index.php?error=User name is required");
        exit();
    } else if(empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // Using prepared statements to prevent SQL injection
        $sql = "SELECT * FROM users WHERE user_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            // Verifying the password
            if(password_verify($pass, $row['password'])){
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit(); 
            } else {
                header("Location: index.php?error=Incorrect User Name or Password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect User Name or Password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>