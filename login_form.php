<html>
<head>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 10/14/2014
 * Time: 7:07 PM
 */

include '_head.php';
include '_connect.php';

?>

<h2>Please Login:</h2>

<form action="login_submit.php">
    <table>
        <tr><td>Username:</td><td><input type="text" name="user_name"/></td></tr>
        <tr><td>Password:</td><td><input type="password" name="password"/></td></tr>
        <tr><td></td><td><input type="submit"/></td></tr>
    </table>
</form>

</body>
</html>