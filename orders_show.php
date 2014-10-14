<html>
<head>
    <link rel="stylesheet" href="/PHP02/css/styles.css"/>
</head>
<body>

<?php include 'head.php'; ?>

<h3>Current orders:</h3>
<table>
    <tr>
        <th>Buyer</th>
        <th>Type</th>
        <th>Date</th>
    </tr>
    <?php

    $user = "developer";
    $password = "123456";
    $host = "localhost";
    $db_name = "php02";

    $db_connection = mysqli_connect($host, $user, $password, $db_name);
    $sql = <<<SQL
    SELECT o.buyer_name as buyer, o.date_created as date, pt.name as type
    FROM orders o LEFT JOIN pizza_types pt on o.type_id = pt.id
SQL;

    if (!$result = mysqli_query($db_connection, $sql)) {
        die('There was an error running the query [' . mysqli_error($db_connection) . ']');
    }
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['buyer'] . "</td>";
        echo "<td>" . $row['type'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }?>
</table>

<a href="/PHP02">Back</a>
</body>
</html>