<html>
<head>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>

<?php include '_head.php'; ?>
<?php include '_connect.php'; ?>

<?php
if ($b_user_logged_in) {

    echo '<h3>What tastes good to you?</h3>';

    $sql = <<<SQL
SELECT *
FROM pizza_types
SQL;


    if (!$result = mysqli_query($db_connection, $sql)) {
        die('There was an error running the query [' . mysqli_error($db_connection) . ']');
    }
    ?>

    <form action="order_place.php">
        <table>
            <tr>
                <td>My name:</td>
                <td><input type="text" name="buyer_name" value="<?php echo $user_name; ?>" disabled></td>
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
    <?php
    $result->free();
}
else {
    echo 'You must log in before you can place an order.';
}
?>
</body>
</html>