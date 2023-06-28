<?php
    require_once("./../../helpers/config.php");

    if (isset($_GET["id"])&&(!empty(isset($_GET["id"]))))
    {
        $id=trim($_GET["id"]);

        //declaring query string
        $sql="DELETE FROM `inventory` WHERE `id`=?;";

        //preparing statement
        if($stmt=mysqli_prepare($link, $sql))
        {
            //binding parameters
            if(mysqli_stmt_bind_param($stmt, "i", $param_id))
            {
                //setting parameters
                $param_id=$id;

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