<?php

use Core\Helpers\Helper; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <link rel="stylesheet"
        href="<?=  $_SERVER['REQUEST_SCHEME'] . "://" .$_SERVER['HTTP_HOST'] ?>/resources/css/dashboard/styles.css">

</head>

<body>



    <div class=" row  ">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand mx-2" href="/dashboard">Management System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Users
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/users">All Users</a></li>
                                <li><a class="dropdown-item" href="/users/create">Create User </a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Main Categories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/main_categories">All Categories</a></li>
                                <li><a class="dropdown-item" href="/main_categories/create">Add Category</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Subcategories
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/subcategories">All Subcategories</a></li>
                                <li><a class="dropdown-item" href="/subcategories/create">Add Subcategory</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                products
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/products">All Products</a></li>
                                <li><a class="dropdown-item" href="/products/create">Add Product</a></li>
                                <li><a class="dropdown-item" href="/products/show_img">Product Images </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-items " href="/logout">Logout
                                <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="col-lg-10  col-md-9 col-sm-6   mt-5 mb-5  mx-5">