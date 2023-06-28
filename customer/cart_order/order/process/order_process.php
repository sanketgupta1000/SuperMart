<?php

    //including connection file
    require_once("./../../../../helpers/config.php");

    //session expired check
    require("./../../../helpers/customer_sess_exp_check.php");

    //empty cart check
    require("./../../helpers/empty_cart_check.php");

    //insert data/row into order_summary table

    //declaring query string
    $sql="INSERT INTO `order_summary` (`user_id`) VALUES (?);";

    //prepare statement + bind parameters + execute
    if(mysqli_execute_query($link, $sql, [$_SESSION['userid']]))
    {
        //successfully inserted record into order summary table
        //getting the auto generated order id
        $orderid=mysqli_insert_id($link);

        foreach($_COOKIE as $pid => $qty)
        {

            if($pid=="PHPSESSID")
            {
                continue;
            }

            //now subtracting quantity for each product from inventory

            //declaring query string
            $sql="UPDATE `inventory` SET `quantity`=`quantity`-? WHERE `id`=?;";

            //prepare statement + bind parameters + execute
            if(mysqli_execute_query($link, $sql, [$qty, $pid]))
            {
                //successfully subtracted from the inventory

                //now getting price from inventory and inserting product data into ordered_products table
                //declaring query string
                $sql="SELECT `price` FROM `inventory` WHERE `id`=?;";

                //prepare statement + bind parameters + execute
                if($result=mysqli_execute_query($link, $sql, [$pid]))
                {
                    //successfully extracted price from inventory

                    $row=mysqli_fetch_array($result);

                    //declaring string to insert into ordered products table
                    $sql="INSERT INTO `ordered_products` (`product_id`, `quantity`, `price`, `order_id`) VALUES (?, ?, ?, ?);";

                    //prepare statement + bind parameters + execute
                    if(mysqli_execute_query($link, $sql, [$pid, $qty, $row['price'], $orderid]))
                    {
                        //successfully inserted into ordered products table
                        
                        //now emptying the cart as order has been made

                        setcookie($pid, "", 1, "/");
                        
                        
                    }
                    else
                    {
                        die("Failed to insert into ordered products table");
                    }
                }
                else
                {
                    die("Failed to extract price from the inventory");
                }
            }
            else
            {
                die("Failed to subtract quantity from the inventory");
            }
        }
        //will redirect to bill page from here
        header("location: /supermart/customer/cart_order/order/ordered_products/ordered_products.php?orderid=".$orderid);
        exit();
        
        
    }
    else
    {
        echo "Failed to insert record into order_summary table";
    }
    
?>