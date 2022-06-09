<?php
require_once 'app/helpers.php';

session_start();

redirect_unauthorized(false, './signin.php');

// get editing post from db
$post = null;

if (isset($_GET['pid']) && is_numeric($_GET['pid'])) {
    $pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_NUMBER_INT);

    if ($pid) {
        $uid = $_SESSION['user_id'];

        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);

        $pid = mysqli_real_escape_string($link, $pid);

        $sql = "SELECT * FROM posts WHERE id=$pid AND user_id=$uid";

        $result = mysqli_query($link, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $post = mysqli_fetch_assoc($result);
        }
    }
}

if (!isset($post)) {
    header('location: ./blog.php');
    exit();
}

if (validate_csrf() && isset($_POST['submit'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $is_form_valid = true;

    if (!$title || mb_strlen($title) <= 2) {
        $is_form_valid = false;
        $errors['title'] = '* Title is required for minimum of 2 characters.';
    }
    if (!$article || mb_strlen($article) <= 2) {
        $is_form_valid = false;
        $errors['article'] = '* Article is required for minimum of 2 characters.';
    }

    if ($is_form_valid) {
        $uid = $_SESSION['user_id'];

        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);

        $title = mysqli_real_escape_string($link, $title);
        $article = mysqli_real_escape_string($link, $article);

        $sql = "UPDATE posts SET title='$title', article = '$article' WHERE id = $pid";
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_affected_rows($link) === 1) {
            header('location: ./blog.php');
            exit();
        }
    }
}

$page_title = "EDIT POST";
include_once './tpl/header.php';
?>

<main class="container flex-fill">

    <!-- PAGE HEADER -->
    <section id="main-top-content">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h1 class="display-3 text-primary">
                    Edit a Post
                </h1>
                <p>
                    Edit your post.
                </p>
            </div>
        </div>
    </section>

    <!-- PAGE CONTENT -->
    <section class="main-content container mt-3">

        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <form action="" method="POST" novalidate="novalidate" autocomplete="off">

                    <input type="hidden" name="<?=csrf_name();?>" value="<?=csrf();?>">

                    <div class="form-group">
                        <label for="title">
                            <span class="text-danger">*</span>
                            Title
                        </label>
                        <input type="text" id="title" name="title" value="<?=old_field_value('title') ? old_field_value('title') : htmlentities($post['title']);?>" class="form-control">
                        <?=field_error('title');?>
                    </div>

                    <div class="form-group mt-2">
                        <label for="article">
                            <span class="text-danger">*</span>
                            Article
                        </label>
                        <textarea name="article" id="article" cols="30" rows="10" class="form-control"><?=old_field_value('article') ? old_field_value('article') : htmlentities($post['article']);?></textarea>
                        <?=field_error('article');?>
                    </div>

                    <div class="d-flex my-3">
                        <input type="submit" name="submit" value="Save Post" class="btn btn-success">

                        <a href="./blog.php" class="btn btn-danger ms-2">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </section>
</main>

<?php include_once './tpl/footer.php';?>