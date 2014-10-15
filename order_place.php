<?php include '_connect.php'; ?>

<?php
$user_id = 1; //$_REQUEST['user_id'];
$type_id = $_REQUEST['type_id'];

if (!$result = mysqli_query($db_connection,
    "insert into orders (user_id, type_id, date_created, last_updated) " .
    "values('" . $user_id . "', '" . $type_id . "', now(), now())")
) {
    die('There was an error running the query [' . mysqli_error($db_connection) . ']');
}

header('Location: index.php');

