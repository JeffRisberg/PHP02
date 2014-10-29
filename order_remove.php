<?php include '_connect.php'; ?>

<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/29/2014
 * Time: 3:30 PM
 *
 * Remove the specified order from the orders table
 */

$order_id=$_REQUEST['order_id'];

$sql = <<<SQL
DELETE FROM orders
WHERE id='$order_id';
SQL;

if (!$result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

header('Location: orders_show.php');