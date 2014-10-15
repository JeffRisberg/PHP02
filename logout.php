<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/14/2014
 * Time: 11:06 PM
 */

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
$b_user_logged_in = 0;
$user_name = NULL;

header('Location: index.php');