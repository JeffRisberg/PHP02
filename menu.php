<html>
<head>
    <link rel="stylesheet" href="/css/styles.css"/>
</head>
<body>

<?php include 'head.php'; ?>

Our pizza types are:
<ul>
    <?php

    $user = "developer";
    $password = "123456";
    $host = "localhost";
    $db_name = "php02";

    $db_connection = mysqli_connect($host, $user, $password, $db_name);
    $sql = <<<SQL
    SELECT *
    FROM pizza_types
SQL;

    if (!$result = mysqli_query($db_connection, $sql)) {
        die('There was an error running the query [' . mysqli_error($db_connection) . ']');
    }
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['name'];
    }?>
</ul>

<p><?php echo 'Total pizza types: ' . $result->num_rows; ?></p>

</body>
</html>