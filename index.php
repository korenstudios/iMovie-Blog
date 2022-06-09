<?php
require_once './app/helpers.php';

session_start();

$page_title = 'HOME';
include './tpl/header.php';
?>

<main class="container flex-fill">

    <!-- PAGE HEADER -->
    <section id="main-top-content">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h1 class="display-3 text-primary">
                    Welcome, Movie Lovers <i class="bi bi-heart-fill ms-3"></i>
                </h1>
                <p>
                    We hope you enjoy our blog site.
                </p>
                <p class="mt-4">
                    <a href="./signup.php" class="btn btn-outline-success btn-lg">
                        Join Us!
                    </a>
                </p>
            </div>
        </div>
    </section>

    <!-- PAGE CONTENT -->
    <section class="main-content container mt-5">

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">
                            Favorites
                        </strong>
                        <h3 class="mb-0">
                            Favorite Movies
                        </h3>
                        <div class="mb-1 text-muted">
                            Nov 12
                        </div>
                        <p class="card-text mb-auto">
                            The most amazing movies you had ever seen
                        </p>
                        <a href="#" class="stretched-link">
                            Continue reading <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="img-fluid" src="./images/favorites_movies.jpg" alt="favorites movies">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">
                            Popular
                        </strong>
                        <h3 class="mb-0">
                            The most popular movies
                        </h3>
                        <div class="mb-1 text-muted">
                            Nov 11
                        </div>
                        <p class="card-text mb-auto">
                            The most popular movies
                        </p>
                        <a href="#" class="stretched-link">
                            Continue reading <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="img-fluid" src="./images/movie_time.jpg" alt="movie time">
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

<?php include './tpl/footer.php';?>