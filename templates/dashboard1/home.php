<?php

  require_once 'connection.php';

  $sql = "SELECT * FROM job_announce";
  $all_product = $conn->query($sql);


?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>خدمة</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="css/styles.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/jdid.css" rel="stylesheet">
<!--font-family-->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        

<!--font-awesome.min.css-->
<link rel="stylesheet" href="./css/font-awesome.min.css">

<!--linear icon css-->
<link rel="stylesheet" href="./css/linearicons.css">

<!--animate.css-->
<link rel="stylesheet" href="./css/animate.css">

<!--flaticon.css-->
<link rel="stylesheet" href="./css/flaticon.css">

<!--slick.css-->
<link rel="stylesheet" href="./css/slick.css">
<link rel="stylesheet" href="./css/slick-theme.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!--style.css-->
<link rel="stylesheet" href="./css/stylev2.css">


<!--responsive.css-->

<link rel="stylesheet" href="./css/responsive.css">
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var securityLink = document.querySelector('a[href="#security"]');
        if (securityLink) {
            securityLink.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                var targetElement = document.getElementById('security');
                if (targetElement) {
                    var offsetTop = targetElement.offsetTop;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: "smooth" // Smooth scrolling
                    });
                }
            });
        }
    });
</script>






        </head>

        <?php
        session_start();
        ?>






        <body>

        

            <div class="container-xxl position-relative bg-white d-flex p-0">
                <!-- Spinner Start -->
                <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <!-- Spinner End -->


                <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light mt-2"  >
                <div class="logo d-flex align-items-center ms-4 mb-4" >
                <a href="index-job-seeker.html" ><img src="../img/khedma_logo_f-02.svg" alt="" style="height: 5vh;">
									</a>
                   
                </div>
                   
            
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    <img class="rounded-circle" src="../lesCINSworkers/<?= $_SESSION['cin_image']?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"> <?=  $_SESSION['first_name']." ".$_SESSION['last_name']?></h6>
                        <span>Worker</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index-job-seeker.html" class="nav-item nav-link "><i class="fas fa-home icon me-2"></i>Home</a>
                    <a href="add-profile.html" class="nav-item nav-link "><i class="fas fa-search icon me-2"></i>Add Profile</a>
                    <a href="home.php" class="nav-item nav-link active"><i class="fas fa-search icon me-2"></i>Opportunities</a>
                    <!-- <a href="notifications.html" class="nav-item nav-link"><i class="fas fa-bell icon me-2"></i>Notifications</a> -->
                    <a href="resume.html" class="nav-item nav-link"><i class="far fa-file icon me-2"></i>Resume Builder</a>
                    <div class="nav-item dropdown">
                        <a href="settings.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-cog icon me-2"></i>Settings</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="settings.html" class="dropdown-item">Profile Management</a>
                            <a href="settings.html#security" class="dropdown-item">Security</a>
                        </div>
                    </div>
                    <a href="logout.php" class="nav-item nav-link"><i class="fas fa-sign-out-alt icon me-2"></i>Logout</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">

                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


                <!-- Content Start -->
                <div class="content">
                    <!-- Navbar Start -->
                       <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index-worker-seeker.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fas fa-home icon"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Messages</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="notifications-worker-seeker.html" class="dropdown-item text-center">See all messages</a>
                        </div>
                    </div>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-envelope icon me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Requests</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../lesCINSworkers/<?= $_SESSION['cin_image']?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?=$_SESSION["first_name"].$_SESSION["last_name"]?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                         
                            <a href="settings1.html" class="dropdown-item">Settings</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
                    <!-- Navbar End -->

                    


                
                    <br>
                    <section id="explore" class="explore p-5">
                        <div class="container">
                            <div class="section-header">
                                <h2> Opportunities </h2>
                                <p>Explore New experience</p>
                            </div><!--/.section-header-->
                            <div class="explore-content">
                        <div class="row">
                        <?php
                        while($row = mysqli_fetch_assoc($all_product)){
                    ?>

                            <div class=" col-md-4 col-sm-6">
                                <div class="single-explore-item">
                                    <div class="single-explore-img">
                             
                                        <img src="./<?php echo $row["company_logo"]; ?>" alt="explore image">
                                        <div class="single-explore-img-info">
                                            <button onclick="window.location.href='#'">best rated</button>
                                        </div>
                                    </div>
                                    <div class="single-explore-txt bg-theme-1">
                                        <h2><a href="#"><?php echo $row["company_name"];  ?></a></h2>
                                        <p class="explore-rating-price">
                                            <span class="explore-rating">5.0</span>
                                            <a href="#"> 10 ratings</a> 
                                            <span class="explore-price-box">
                                                Salary : 
                                                <span class="explore-price"><?php echo $row["salary"]; ?> TND</b></span>
                                            </span>
                                            <br>
                                            <br>
                                            Poste Avaible :
                                             <?php echo $row["job_name"]; ?>
                                             <br>
                                             <br>
                                             Description:
                                             <?php echo $row["description"]; ?>
                                        </p>
                                        
                                        <div class="explore-open-close-part">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <button class="close-btn" onclick="window.location.href='#'">avaible</button>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="explore-map-icon">
                                                        <a href="#"><i data-feather="map-pin"></i></a>
                                                        <a href="#"><i data-feather="upload"></i></a>
                                                        <a href="#"><i data-feather="heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php

                            }
                            ?>
                           









                                    
                                </div>
                            </div>
                        </div><!--/.container-->
                    
                    </section><!--/.explore-->
                    <!--explore end -->


                    <br>
<div class="blockcode">
    
    <footer class="shadow" style="background-color: rgb(238, 235, 235);">
      <div
        class="d-flex justify-content-between align-items-center mx-auto py-4 flex-wrap"
        style="width: 80%"
      >
        <a href="/#" class="d-flex align-items-center p-0 text-dark">
          <img alt="logo" src="../img/khedma_logo_f-02.svg" width="80px" />
          <!-- <span class="ms-4 h5 font-weight-bold">Devwares</span> -->
        </a>
        <small>&copy; © Copyright 2024  |  All Rights Reserved by <a  href="https://www.wpthemesgrid.com" target="_blank"><small>larma.com</small></a></small>
        <div>
          <button class="btn btn-dark btn-flat p-2">
            <i class="fab fa-facebook"></i>
          </button>
          <button class="btn btn-dark btn-flat p-2">
            <i class="fab fa-twitter"></i>
          </button>
          <button class="btn btn-dark btn-flat p-2">
            <i class="fab fa-instagram"></i>
          </button>
        </div>
      </div>
    </footer>
    <br>
    <br>
    <br></div>
                <!-- Content End -->


                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            </div>

            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/chart/chart.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="lib/tempusdominus/js/moment.min.js"></script>
            <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
            <script>
                feather.replace();
            </script>
            
        </body>

        </html>