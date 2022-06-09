<?php define('LOGO', 'i<i class="bi bi-film mx-1"></i>Movie');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMovie<?=isset($page_title) ? " | $page_title" : '';?></title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="./js/script.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark bg-gradient shadow-lg" aria-label="Third navbar example">
            <div class="container">

                <!-- LOGO -->
                <a class="navbar-brand" href="./">
                    <?=LOGO;?>
                </a>

                <!-- BOOTSTRAP NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- NAVBAR LINKS -->
                <div class="collapse navbar-collapse" id="navbarsExample03">

                    <!-- NAVBAR LEFT LINKS -->
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">

                        <li class="nav-item">
                            <a class="nav-link<?=active_nav_link('ABOUT');?>" href="./about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?=active_nav_link('BLOG');?>" href="./blog.php">Blog</a>
                        </li>

                    </ul>

                    <!-- NAVBAR RIGHT LINKS -->
                    <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                        <?php if (!isset($_SESSION['user_id'])): ?>

                            <li class="nav-item">
                                <a class="nav-link<?=active_nav_link('SIGN IN');?>" href="./signin.php">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?=active_nav_link('SIGN UP');?>" href="./signup.php">Sign Up</a>
                            </li>

                        <?php else: ?>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="./profile.php">
                                    <img style="border-color: #ababab;" class="border border-2 rounded-circle" width="25" src="./images/profiles/<?=$_SESSION['user_profile_image'];?>" alt="profile">
                                    <?=$_SESSION['user_name'];?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./logout.php">Sign Out</a>
                            </li>

                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>