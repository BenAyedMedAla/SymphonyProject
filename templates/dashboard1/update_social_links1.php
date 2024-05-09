<?php
session_start(); 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $host = "localhost";
    $dbname = "khedma";
    $username = "root";
    $password = "";
   
    
    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        die("Connection error: " . mysqli_connect_errno());
    }
    
// Retrieve social media links from form submission
$twitter_link = $_POST['twitter_link'];
$facebook_link = $_POST['facebook_link'];
$linkedin_link = $_POST['linkedin_link'];
$instagram_link = $_POST['instagram_link'];

// Retrieve email from session
$email = $_SESSION['email']; // Assuming 'email' is the key where the email is stored in the session

// Check if the email exists in the social_media table
$sql = "SELECT * FROM social_media_companies WHERE email='$email'";
$result = $conn->query($sql);
 
$_SESSION["twitter"] = $twitter_link;
$_SESSION["facebook"]=$facebook_link;
$_SESSION["instagram"]=$instagram_link;
$_SESSION["linkedin"]=$linkedin_link;
if ($result->num_rows > 0) {
    // Email exists, update the record
    $sql_update = "UPDATE social_media_companies SET twitter='$twitter_link', facebook='$facebook_link', linkedin='$linkedin_link', instagram='$instagram_link' WHERE email='$email'";
    $row = $result->fetch_assoc();
   

    if ($conn->query($sql_update) === TRUE) {
        header("Location: myprofile1.html");
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Email does not exist, insert a new record
    $sql_insert = "INSERT INTO social_media_companies (email,facebook,instagram,twitter,linkedin) VALUES ('$email', '$twitter_link', '$facebook_link', '$linkedin_link', '$instagram_link')";
    
    if ($conn->query($sql_insert) === TRUE) {
        header("Location: myprofile1.html");
    } else {
        echo "Error creating record: " . $conn->error;
    }
    }
}