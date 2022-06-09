<?php
require_once 'app/helpers.php';

session_start();

redirect_unauthorized();

session_destroy();
setcookie(session_name(), '', time() - 1, session_get_cookie_params()['path']);

header('location: ./');
