<?php
    //checking if order id present or not in parameters
    if((isset($_GET['orderid'])) and !empty(isset($_GET['orderid'])))
    {
        //including database connection file
        require_once("./../../../../helpers/config.php");

        //now we will check if the given orderid belongs to the user or not
        //declaring query string
        $sql="SELECT * FROM `order_summary` WHERE `order_id`=? and `user_id`=?;";

        //preparing statement + binding parameters + executing statement
        if($result=mysqli_execute_query($link, $sql, [$_GET['orderid'], $_SESSION['userid']]))
        {
            if(!(mysqli_num_rows($result)))
            {
                echo "<script> alert('No order found.'); </script>";
                header("location: /supermart/customer/cart_order/order/my_orders/my_orders.php");
                exit();
            }
            else
            {
                //now accessing order time and printing order id and order time
                $row=mysqli_fetch_array($result);

                echo "<section class='infobox'><h3 class='orderinfo'>Order ID: ".$_GET['orderid']."</h3><h3 class='orderinfo'>Order Time: ".$row['order_time']."</h3></section>";

                //now fetching data of all products for that order id
                //declaring query string
                $sql="SELECT `inventory`.`name`, `ordered_products`.`price`, `ordered_products`.`quantity` FROM `ordered_products`
                    INNER JOIN `inventory` ON `ordered_products`.`product_id`=`inventory`.`id`
                    WHERE `ordered_products`.`order_id`=?;";

                //preparing statement + binding parameters + executing statement
                if($result=mysqli_execute_query($link, $sql, [$_GET['orderid']]))
                {
                    //successfully fetched product details

                    //now printing data in the form of a table
                    echo "<div class='tablecont'>";
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Product Name</th>";
                    echo "<th>Price</th>";
                    echo "<th>Quantity</th>";
                    echo "<th>Total</th>";
                    echo "</tr>";
                    echo "</thead>";

                    echo "<tbody>";
                    $grand_total=0;

                    while($row=mysqli_fetch_array($result))
                    {
                        $total=$row['price']*$row['quantity'];
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "<td>".$total."</td>";
                        echo "</tr>";

                        $grand_total+=$total;
                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    echo "<h3>Grand Total = ".$grand_total."</h3>";
                }
                else
                {
                    echo "Failed to fetch ordered products data from database.";
                }
            }
        }
        else
        {
            echo "Failed to validate order id";
        }
    }
?>