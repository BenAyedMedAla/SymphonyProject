+<?php
session_start();

// Function to change password
function changePassword($oldPassword, $newPassword) {
    // Here you would implement your logic to verify the old password and update the new password
    // For example, you might compare the old password stored in your database with $oldPassword
    // If it matches, update the password with $newPassword
    $email =$_SESSION["email"];
    $oldStoredPassword = $_SESSION["mot_de_passe"];
    if ($oldPassword === $oldStoredPassword) {
        // Update password logic goes here
        // For now, let's just echo a success message
        $host = "localhost";
        $dbname = "khedma";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($host, $username, $password, $dbname);

        if(mysqli_connect_errno()){
            die("Connection error: " . mysqli_connect_errno());
    }

    $query = "UPDATE reg_seeker SET mot_de_passe = '$newPassword' WHERE email = '$email'";
    $_SESSION["mot_de_passe"]=$newPassword;
    if (mysqli_query($conn, $query)) {
        header("Location: index-worker-seeker.html");
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}}

// Function to change email
function changeEmail($oldEmail, $newEmail) {
    $email =$_SESSION["email"];
    // Dummy logic for demonstration
    
    if ($oldEmail === $email) {
        // Update password logic goes here
        // For now, let's just echo a success message
        $host = "localhost";
        $dbname = "khedma";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($host, $username, $password, $dbname);

        if(mysqli_connect_errno()){
            die("Connection error: " . mysqli_connect_errno());
    }

    $query = "UPDATE reg_seeker SET email = '$newEmail' WHERE email = '$email'";
    $_SESSION["email"]=$newEmail;
   
    if (mysqli_query($conn, $query)) {
        header("Location: index-worker-seeker.html");
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}
    
}

// Check which form was submitted
if (isset($_POST['change_password'])) {
    // Password change form was submitted
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['password'];
    changePassword($oldPassword, $newPassword);}
if (isset($_POST['change_email'])) {
    // Email change form was submitted
    $oldEmail = $_POST['oldemail'];
    $newEmail = $_POST['email'];
    changeEmail($oldEmail, $newEmail);
}

?>