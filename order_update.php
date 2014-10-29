<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/27/2014
 * Time: 10:50 PM
 */

$order_id=$_REQUEST['order_id'];
$operation=$_REQUEST['operation'];
$buyer_name = $_REQUEST['buyer_name'];
$type_name = $_REQUEST['type_name'];
$spicyness = $_REQUEST['spicyness'];

$user = "developer";
$password = "123456";
$host = "localhost";
$db_name = "php01";

$db_connection = mysqli_connect($host, $user, $password, $db_name);

//debug
var_dump($operation);

if ($operation == 'Delete') {
    $sql = <<<SQL
DELETE FROM orders
WHERE order_id='$order_id';
SQL;
}
else if ($operation == 'Update') {
    $sql = <<<SQL
UPDATE orders
SET buyer_name='$buyer_name', type_name='$type_name', spicyness='$spicyness', last_updated=now()
WHERE order_id=$order_id;
SQL;

}

if (!$result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

header('Location: http://localhost/PHP01/index.php');