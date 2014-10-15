<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/14/2014
 * Time: 7:10 PM
 */

include '_connect.php';

session_start();
$_SESSION['user_id'] = 1;

header('Location: index.php');