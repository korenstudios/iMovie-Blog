<?php
require_once './app/helpers.php';

session_start();

$page_title = 'ABOUT';
include './tpl/header.php';
?>

<main class="container flex-fill">

    <!-- PAGE HEADER -->
    <section id="main-top-content">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h1 class="display-3 text-primary">
                    About <?=LOGO;?>
                </h1>
                <p>
                    In our blog site you can make posts about movies from all genre kinds, the most interesting and favorites.<br>
                    In addition, you can give your opinion and critics what is on your mind.<br>
                    We are very happy you here and have fun!
                    <span class="d-block text-danger"><u>Note:</u> only registered users can create posts.</span>
                </p>
            </div>
        </div>
    </section>

    <!-- PAGE CONTENT -->
    <!-- <section class="main-content container mt-5">

            <div class="row mb-2">

            </div>

        </section> -->
</main>

<?php include './tpl/footer.php';?>