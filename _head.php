<?php include '_login.php'; ?>

<div class="head">

    <div style="font-weight: bold; font-size: 19px; padding: 5px">Welcome to ZZA Pizza!</div>
    <div style="float:right"><img src="img/php02_logo.png"/></div>

    <table style="background-color: #9999cc; padding: 5px">
        <tr>
            <td style="padding: 5px"><a href="index.php">Home</a></td>
            <td style="padding: 5px"><a href="menu.php">Menu</a></td>
            <td style="padding: 5px"><a href="order_form.php">Place Order</a></td>
            <td style="padding: 5px"><a href="orders_show.php">Show Orders</a></td>
            <?php
                if ($b_user_logged_in == 1) {
                    echo '<td style=/"padding: 5px/">Welcome back ' . $user_name . '</td>';
                    echo '<td style="padding: 5px"><a href="logout.php">Log Out</a></td>';
                }
                else {
                    echo '<td style="padding: 5px"><a href="login_form.php">Login</a></td>';
                }
            ?>
        </tr>
    </table>
</div>