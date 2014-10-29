<?php include '_head.php'; ?>
<?php include '_connect.php'; ?>

<html>
<head>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>

<h3>Current orders:</h3>
<table border="1">
    <tr>
        <th>Buyer</th>
        <th>Type</th>
        <th>Date</th>
    </tr>
    <?php
    $sql = <<<SQL
    SELECT o.id AS oder_id, u.user_name AS buyer_name, pt.name AS pizza_type, o.date_created AS date
    FROM orders o
    INNER JOIN pizza_types pt ON o.type_id = pt.id
    INNER JOIN users u ON o.user_id = u.id
    ORDER BY date DESC
SQL;

    if (!$result = mysqli_query($db_connection, $sql)) {
        die('There was an error running the query [' . mysqli_error($db_connection) . ']');
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['buyer_name']}</td>";
        echo "<td>{$row['pizza_type']}</td>";
        echo "<td>{$row['date']}</td>";
        echo "<td><a href=\"order_edit.php?order_id=" . $row['oder_id'] . "\">Edit</a></td>";
        echo "<td><a href=\"order_remove.php?order_id=" . $row['oder_id'] . "\">Delete</a></td>";
        echo "</tr>";
    }?>
</table>

</body>
</html>