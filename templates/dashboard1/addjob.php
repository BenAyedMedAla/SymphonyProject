<?php
session_start();
$host="localhost";
$dbname="khedma";
$username = "root";
$password  ="";

if (isset($_POST['name'])){
    $email=$_SESSION["email"];
    $company_name=$_POST["name"];
    $target2="lesCOMPANIES/".$email.$company_name.'-'.basename($_FILES['logo-company']['name']);
    


$conn=mysqli_connect( hostname: $host, 
                database: $dbname,
                password: $password, 
                username: $username );
 
if(mysqli_connect_errno()){
    die("Connection error: " .mysqli_connect_errno());
}

$pname=$company_name.'-'.basename($_FILES['logo-company']['name']);

$salary=$_POST["salary"];
$job=$_POST["job"];
$description=$_POST["profile"];

$check_query = "SELECT MAX(id) AS max_id FROM job_announce";
$result = mysqli_query($conn, $check_query);
$row = mysqli_fetch_assoc($result);
$max_id = $row['max_id'];
$id = $max_id + 1;


$check_query = "SELECT * FROM job_announce WHERE email = '$email' and salary='$salary' and job_name='$job' and description='$description' and company_name='$company_name'";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    header('location : 404.html');
    exit;}
else{

  
    $sql= "INSERT INTO job_announce (id ,email, company_name,job_name, salary, description, company_logo)
            VALUES ('$id','$email','$company_name','$job','$salary','$description','$target2')";
            
    $stmt = mysqli_stmt_init($conn);
    mysqli_query($conn,$sql);
    
    
    move_uploaded_file($_FILES['logo-company']['tmp_name'],$target2);

    }
    header('Location: index-worker-seeker.html'); // Change 'form_page.php' to the actual filename of your form page
    exit;
}

