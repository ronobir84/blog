<?php session_start() ?>

<?php
include "../config.php";
if (!isset($_SESSION['user_data'])) {
    echo "<script>window.location.href='http://localhost/Blog/Login.php'</script>";
    // header("location:http://localhost/Blog/Login.php");
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Admin - Dashboard</title>
    <!-- Custom fonts for this template-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <!-- Custom styles for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">



</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
    body {
        font-family: "Nunito Sans", sans-serif;
    }
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="   bg-[#FFFFFF] w-80 min-h-screen shadow-md " id="">
            <!-- Sidebar - Brand -->
            <a href=" " class="text-center">
                <h1 class="text-4xl   font-bold   from-purple-400 via-pink-400 to-blue-400 bg-gradient-to-r bg-clip-text text-transparent uppercase relative right- top-3">Blog</h1>
            </a>

            <div class="relative top-24 space-y-8">

                <a class=" " href="index.php">
                    <li class=" text-xl text-black text-center font-semibold w-full h-12 duration-300 hover:bg-purple-500 dark:hover:bg-purple-500 dark:hover:text-white   px-4 py-[9px]  ">

                        <span> Blogs</span>
                    </li>
                </a>
                <?php
                global $admin;
                if (isset($_SESSION['user_data'])) {
                    $admin = $_SESSION['user_data']['2'];
                }
                if ($admin == 1) {


                ?>

                    <a class="" href="users.php">
                        <li class=" text-xl text-black text-center t font-semibold w-full h-12 duration-300   dark:hover:text-white hover:bg-purple-500 dark:hover:bg-purple-500   px-4 py-[9px]  mt-7">
                            Users
                        </li>
                    </a>
                    <a class="" href="categories.php">
                        <li class=" text-xl text-black text-center font-semibold w-full h-12 duration-300 hover:bg-purple-500 dark:hover:bg-purple-500 dark:hover:text-white   px-4 py-[9px]  mt-7">
                            Categories
                        </li>

                    </a>



                <?php } ?>

            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-[#FFFFFF] topbar mb-4 static-top shadow-md ">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-search fa-fw"></i> </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow +animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li>
                            <!-- 1 -->
                            <div class="flex gap-3 items-center relative right-4">
                                <h3 class="text-lg text-black font-semibold">

                                    <?php
                                    if (isset($_SESSION['user_data'])) {
                                        echo ucwords($_SESSION['user_data']['1']);
                                    }




                                    ?>
                                </h3>
                                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 " type="button">
                                    <img class="w-12 h-12 rounded-full " src="https://i.ibb.co/98W6xRQ/new.png" alt="">
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div id="dropdownAvatar" class="z-10 hidden bg-[#FFFFFF]  absolute    divide-gray-100  shadow-md w-44 h-40">
                               

                                <ul class="py-3  font-semibold text-lg text-black">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-purple-500 dark:hover:bg-purple-500 dark:hover:text-white">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-purple-500 dark:hover:bg-purple-500 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="logout.php" class="block px-4 py-2 hover:bg-purple-500 dark:hover:bg-purple-500 dark:hover:text-white">Logout</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- 2 -->
                        </li>
                    </ul>
                </nav>
                <!-- End header -->