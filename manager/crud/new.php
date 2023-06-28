<?php
    require_once("./../../helpers/config.php");

    if(isset($_GET["name"])&&(!empty(isset($_GET["name"]))))
    {
        $img_url=trim($_GET["image"]);
        $name=trim($_GET["name"]);
        $desc=trim($_GET["description"]);
        $manu=trim($_GET["manufacturer"]);
        $price=trim($_GET["price"]);
        $qty=trim($_GET["quantity"]);

        //declaring query string
        $sql="INSERT INTO `inventory` (`img_url`, `name`, `description`, `manufacturer`, `price`, `quantity`) VALUES (?, ?, ?, ?, ?, ?);";

        //preparing statement
        if($stmt=mysqli_prepare($link, $sql))
        {
            //binding parameters
            if(mysqli_stmt_bind_param($stmt, "ssssii", $param_img, $param_name, $param_desc, $param_manu, $param_price, $param_qty))
            {
                //setting parameters
                $param_img=$img_url;
                $param_name=$name;
                $param_desc=$desc;
                $param_manu=$manu;
                $param_price=$price;
                $param_qty=$qty;

                //executing
                if(mysqli_stmt_execute($stmt))
                {
                    //success
                    header("location: /supermart/manager/home/manager_home.php");
                    exit();
                }
                else
                {
                    die("ERROR : Failed to execute prepared statement.");
                }
            }
            else
            {
                die("ERROR : Failed to bind parameters.");
            }
        }
        else
        {
            die("ERROR : Failed to prepare statement.");
        }
    }
    else
    {
        echo "not able to go inside first if";
    }
?>