<?php
session_start();
$host="localhost";
$dbname="khedma";
$username = "root";
$password  ="";

if (isset($_POST['age'])){
    $email=$_SESSION["email"];

    $target2="CVSs/".$email.'-'.basename($_FILES['cv']['name']);
    


$conn=mysqli_connect( hostname: $host, 
                database: $dbname,
                password: $password, 
                username: $username );
 
if(mysqli_connect_errno()){
    die("Connection error: " .mysqli_connect_errno());
}



$education=$_POST["education"];
$skills=$_POST["skills"];
$age=$_POST["age"];
$experiences=$_POST["experiences"];

$photo=$_SESSION["cin_image"];

$first_name=$_SESSION["first_name"] ;
$last_name=$_SESSION["last_name"];
$check_query = "SELECT * FROM profiles WHERE email = '$email' ";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    header('location : 404.html');
    exit;}
else{

  
    $sql= "INSERT INTO profiles (email, age,education, skills, experiences, cv,photo,first_name,last_name)
            VALUES ('$email','$age','$education','$skills','$experiences','$target2','$photo','$first_name','$last_name')";
            
    $stmt = mysqli_stmt_init($conn);
    mysqli_query($conn,$sql);
    
    
    move_uploaded_file($_FILES['cv']['tmp_name'],$target2);

    }
    header('Location: index-job-seeker.html'); // Change 'form_page.php' to the actual filename of your form page
    exit;
}

