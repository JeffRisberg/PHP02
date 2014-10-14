<html>
<head>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>

<?php include '_head.php'; ?>
<?php include '_connect.php'; ?>

Our pizza types are:
<ul>
    <?php
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