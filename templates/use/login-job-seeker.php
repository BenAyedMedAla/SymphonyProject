<?php
session_start(); 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $host = "localhost";
    $dbname = "khedma";
    $username = "root";
    $password = "";

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(mysqli_connect_errno()){
        die("Connection error: " . mysqli_connect_errno());
    }
    
    $query = "SELECT * FROM registration WHERE email='$email' AND mot_de_passe='$pass'";

    $result = $conn->query($query);
    $row_count = mysqli_num_rows($result);

    if($result->num_rows == 1){
        // L'utilisateur est authentifié avec succès
        // Vous pouvez ajouter ici le code pour rediriger l'utilisateur vers une autre page, par exemple :
        $row = $result->fetch_assoc();
    
        $_SESSION["first_name"] = $row['first_name'];
        $_SESSION["last_name"]=$row['last_name'];
   
        $_SESSION["email"]=$row['email'];
        $_SESSION["city"]=$row['city'];
        $_SESSION["phone_number"]=$row["phone_number"];
        $_SESSION["mot_de_passe"]=$row["mot_de_passe"];
        
        $_SESSION["cin_image"]=$row['cin_image'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["phone_number"]=$row['phone_number'];
        $firstname=$row['first_name'];
        $lastname=$row['last_name'];
        $cinimg=$row['cin_image'];
        $email=$row['email'];
        $phone=$row['phone_number'];
        $data = array(
            'first-name' => $firstname,
            'last-name' => $lastname,
            'cin-img' => $cinimg,
            'e-mail' =>$email,
            'phone-number' => $phone,

        );
        $jsonData = json_encode($data);
        setcookie('personData', $jsonData, time() + (86400 * 30), "/");
      
        header('Location: /tpweb/dashboard1/index-job-seeker.html');
        exit();
    } else {
        // Échec de l'authentification
        header('Location: 404.html');
        exit();
    }

    $conn->close();
}
?>
