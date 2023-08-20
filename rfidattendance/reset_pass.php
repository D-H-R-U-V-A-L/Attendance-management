<?php
    require('connect.db');
    session_start();
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Retrieve the user's account information
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // Hash the new password
    $new_hash = password_hash('4125', PASSWORD_BCRYPT);
    
    // Update the user's password in the database
    $sql = "UPDATE users SET password='$new_hash' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
    
    // Close the connection
    mysqli_close($conn);
?>    