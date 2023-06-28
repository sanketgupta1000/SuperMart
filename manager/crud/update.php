<?php
    require_once("./../../helpers/config.php");

    if((isset($_GET["id"]))&&(!empty(isset($_GET["id"]))))
    {

        echo "inside isset if";
        //accessing data given through GET
        $id=trim($_GET["id"]);
        $name=trim($_GET["name"]);
        $desc=trim($_GET["description"]);
        $manu=trim($_GET["manufacturer"]);
        $price=trim($_GET["price"]);
        $qty=trim($_GET["quantity"]);

        //declaring query string

        $sql="UPDATE `inventory` SET name=?, description=?, manufacturer=?, price=?, quantity=? WHERE id=?;";

        //preparing statement
        if($stmt=mysqli_prepare($link, $sql))
        {
            echo "inside prepare";
            //binding parameters
            if(mysqli_stmt_bind_param($stmt, "sssiii", $param_name, $param_desc, $param_manu, $param_price, $param_qty, $param_id))
            {
                echo "inside bind";
                //setting parameters
                $param_name=$name;
                $param_desc=$desc;
                $param_manu=$manu;
                $param_price=$price;
                $param_qty=$qty;
                $param_id=$id;

                //executing statement

                if(mysqli_stmt_execute($stmt))
                {
                    echo "inside execute";
                    //Success
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