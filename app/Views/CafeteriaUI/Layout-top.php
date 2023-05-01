<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ITI Cafeteria</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="../../../public/assets/CafeteriaUI/img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../public/assets/CafeteriaUI/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../public/assets/CafeteriaUI/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../public/assets/CafeteriaUI/css/style.min.css" rel="stylesheet">
</head>

<body>
<!-- Navbar Start -->
<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="index.html" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white">ITI Cafeteria</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="myOrders.html" class="nav-item nav-link">My Orders</a>
                <a href="about.html" class="nav-item nav-link">About Us</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
                    <div class="dropdown-menu text-capitalize">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="/users/logout" class="dropdown-item">Logout</a>
                            <a href="#" class="dropdown-item">Profile</a>
                        <?php else: ?>
                            <a href="/users/login" class="dropdown-item">Login</a>
                            <a href="/users/register" class="dropdown-item">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>