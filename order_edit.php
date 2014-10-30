<!--/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/27/2014
 * Time: 10:47 PM
 */-->
<?php include '_head.php'; ?>
<?php include '_connect.php'; ?>

<html>
<body>

<h2>Please Modify your Order:</h2>

<?php
$order_id = $_REQUEST['order_id'];

$sql = <<<SQL
SELECT o.type_id as type_id, u.id as user_id, u.user_name as user_name
FROM orders o
INNER JOIN users u ON o.user_id = u.id
WHERE o.id = $order_id
SQL;

if (!$results = mysqli_query($db_connection, $sql)) {
    die ('There was an error running the query [' . mysqli_error($db_connection) . "]");
}

echo "Number of rows returned: " . mysqli_num_rows($results) . "<br>";
echo "Order_id=" . $order_id . "<br>";

$row = $results->fetch_assoc();
//var_dump($row);

$sql = <<<SQL
SELECT *
FROM pizza_types
SQL;

if (!$pizza_result = mysqli_query($db_connection, $sql)) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}
?>

<form action="order_update.php">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
    <input type="hidden" name="user_id" value="<?php echo $row["user_id"]; ?>" readonly>
    <table>
        <tr>
            <td>My name:</td>
            <td><input type="text" value="<?php echo $row["user_name"]; ?>" readonly></td>
        </tr>
        <tr>
            <td>My type:</td>
            <td>
                <select name="type_id">
                    <?php
                    while ($pizza_type_row = $pizza_result->fetch_assoc()) {
                        $pizza_type_id = $pizza_type_row['id'];
                        $pizza_type_name = $pizza_type_row['name'];
                        $selected = ($row['type_id'] == $pizza_type_id) ? "selected" : "";

                        echo "<option value='" . $pizza_type_id . "' " . $selected . ">" . $pizza_type_name . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit"></td>
        </tr>
    </table>
</form>
</body>
</html>