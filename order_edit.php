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
Select *
From orders
Where id = $order_id
SQL;

if (!$results = mysqli_query($db_connection, $sql)) {
    die ('There was an error running the query [' . mysqli_error($db_connection) . "]");
}

echo "Number of rows returned: " . mysqli_num_rows($results) . "<br>";
echo "Order_id=" . $order_id . "<br>";

$row = $results->fetch_row();
//var_dump($row);
?>

<form action="order_place.php">
    <table>
        <tr>
            <td>My name:</td>
            <td><input type="text" name="buyer_name" value="<?php echo $row["buyer_id"]; ?>" disabled></td>
        </tr>
        <tr>
            <td>My type:</td>
            <td>
                <select name="type_id">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
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