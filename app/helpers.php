<?php
require_once 'db_config.php';

if (!function_exists('login_user')) {
    function login_user($id, $name, $profile_image, $location = null)
    {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_profile_image'] = $profile_image;

        if (isset($location)) {
            header("location: $location");
            exit();
        }
    }
}

if (!function_exists('old_field_value')) {

    function old_field_value($field_name)
    {
        return isset($_REQUEST[$field_name]) ? $_REQUEST[$field_name] : '';
    }
}

if (!function_exists('field_error')) {

    $errors = [];

    function field_error($field_name)
    {
        global $errors;

        if (isset($errors) && !empty($errors[$field_name])) {
            return '<span class="text-danger">' . $errors[$field_name] . '</span>';
        }
    }
}

if (!function_exists('user_auth')) {

    function user_auth()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }

        return false;
    }
}

if (!function_exists('email_exists')) {
    function email_exists($link, $email)
    {
        $email = mysqli_real_escape_string($link, $email);
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($link, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return true;
        }

        return false;
    }
}

if (!function_exists('redirect_unauthorized')) {
    function redirect_unauthorized($redirect_if_is_logged = false, $location = './')
    {
        if (
            ($redirect_if_is_logged && user_auth()) ||
            (!$redirect_if_is_logged && !user_auth())
        ) {
            header("location: $location");
            exit();
        }
    }
}

if (!function_exists('validate_csrf')) {
    function validate_csrf()
    {
        if (isset($_REQUEST[csrf_name()]) && isset($_SESSION[csrf_name()])) {
            return $_REQUEST[csrf_name()] === $_SESSION[csrf_name()];
        }

        return false;
    }
}

if (!function_exists('csrf')) {
    function csrf()
    {
        $token = sha1(rand(1, 100000000)) . '$$' . rand(1, 1000000) . 'imovie';
        $_SESSION[csrf_name()] = $token;

        return $token;
    }
}

if (!function_exists('csrf_name')) {
    function csrf_name()
    {
        return 'csrf_token';
    }
}

if (!function_exists('active_nav_link')) {
    function active_nav_link($item_title)
    {
        global $page_title;
        $class_str = '';

        if (isset($page_title) && $page_title === $item_title) {
            return ' active';
        }
        return $class_str;
    }
}
