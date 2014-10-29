<?php include '_connect.php'; ?>

<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/27/2014
 * Time: 10:50 PM
 */

var_dump($_REQUEST);

$order_id=$_REQUEST['order_id'];
$user_id = $_REQUEST['user_id'];
$type_id = $_REQUEST['type_id'];

    $sql = <<<SQL
UPDATE orders
SET user_id='$user_id', type_id='$type_id', last_updated=now()
WHERE id=$order_id;
SQL;

if (!$result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

header('Location: orders_show.php');