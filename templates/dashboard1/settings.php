<?php
session_start(); 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $host = "localhost";
    $dbname = "khedma";
    $username = "root";
    $password = "";
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Retrieve email from session
    $email = $_SESSION['email']; 
    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        die("Connection error: " . mysqli_connect_errno());
    }
    $sql = "UPDATE registration SET first_name='$first_name', last_name='$last_name' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        // Update session with new information
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        
        // Redirect back to the form page
        if (isset($_POST['redirect_url'])) {
            header("Location: " . $_POST['redirect_url']);
            exit();
        } else {
            // Handle case where redirect URL is not set
            echo "Redirect URL is not set.";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
    ?>