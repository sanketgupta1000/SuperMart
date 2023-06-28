<?php
    //including the connection file
    require_once("./../../../../helpers/config.php");
    
    //now fetching all orders of user from order_summary table
    //declaring query string
    $sql="SELECT `order_id`, `order_time` FROM `order_summary` WHERE `user_id`=? ORDER BY `order_time` DESC;";

    //preparing statement + binding parameters + executing statement
    if($result=mysqli_execute_query($link, $sql, [$_SESSION['userid']]))
    {
        //successfully fetched orders

        //now checking if 0 orders
        if(!(mysqli_num_rows($result)))
        {
            echo "<h2>You haven't made any orders yet!</h2>";
        }
        else
        {
            //now printing the data in a table
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Order ID</th>";
            echo "<th>Order Time</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";

            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>".$row['order_id']."</td>";
                echo "<td>".$row['order_time']."</td>";
                echo "<td><a href='/supermart/customer/cart_order/order/ordered_products/ordered_products.php?orderid=".$row['order_id']."'>View</a></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }
    }
    else
    {
        echo "Error. Failed to fetch order details from order summary table.";
    }
?>