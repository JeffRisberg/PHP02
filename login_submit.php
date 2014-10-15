<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/14/2014
 * Time: 7:10 PM
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

include '_connect.php';

$user_name = $_REQUEST['user_name'];
$password  = $_REQUEST['password'];

$sql = <<<SQL
SELECT *
FROM users
WHERE user_name='$user_name'
SQL;

if (!$result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();
    var_dump($row);
    if ($row['password'] == $password) {
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['user_name'];
    }
    else {
        die('Incorrect password for user \'' . $user_name . '\'');
    }
}
else {
    die('No user found for user name: ' . $user_name . '.');
}

header('Location: index.php');

