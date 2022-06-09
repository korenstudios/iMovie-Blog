<?php
require_once './app/helpers.php';

session_start();

redirect_unauthorized(true);

if (validate_csrf() && isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$email) {
        $errors['email'] = '* A valid email is required';
    } elseif (!$password) {
        $errors['password'] = '* Please enter your password';
    } else {
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);

        $email = mysqli_real_escape_string($link, $email);
        $password = mysqli_real_escape_string($link, $password);

        $sql = "SELECT * FROM users u LEFT JOIN users_profile up ON u.id = up.user_id WHERE u.email='$email'";
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                login_user($user['id'], $user['name'], $user['profile_image'], './blog.php');
            }
        } else {
            $errors['submit'] = '* Wrong email or password';
        }
    }
}

$page_title = 'SIGN IN';
include './tpl/header.php';
?>

<main class="container flex-fill">

    <!-- PAGE HEADER -->
    <section id="main-top-content">
        <div class="row">
            <div class="col-12 mt-5 text-center">
                <h1 class="display-3 text-primary">
                    Sign in with your account
                </h1>
                <p>
                    You can sign in here with your account.
                </p>
            </div>
        </div>
    </section>

    <!-- PAGE CONTENT -->
    <section class="main-content container mt-5">

        <div class="row mb-2">
            <div class="col-12 col-md-6 mx-auto">

                <form action="" method="POST" novalidate="novalidate" autocomplete="off">

                    <input type="hidden" name="<?=csrf_name();?>" value="<?=csrf();?>">

                    <div class="form-group mt-3">
                        <label for="email">
                            <span class="text-danger me-1">*</span>
                            Email
                        </label>
                        <input type="email" name="email" id="email" class="form-control">
                        <?=field_error('email');?>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">
                            <span class="text-danger me-1">*</span>
                            Password
                        </label>
                        <input type="password" name="password" id="password" class="form-control">
                        <?=field_error('password');?>
                    </div>

                    <div class="d-flex my-3">
                        <input type="submit" name="submit" value="Sign In" class="btn btn-primary mt-3">
                    </div>
                    <?=field_error('submit');?>
                </form>

            </div>
        </div>

    </section>
</main>

<?php include './tpl/footer.php';?>