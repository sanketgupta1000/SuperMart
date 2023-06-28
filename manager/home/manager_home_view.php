<?php

    require_once("./../../helpers/config.php");

    $sql="SELECT * FROM `inventory`;";
    
    if($result=mysqli_query($link, $sql))
    {
        if(mysqli_num_rows($result))
        {
            while ($row=mysqli_fetch_array($result))
            {
                echo "<div class='product_card' id='product".$row['id']."'>";
                echo "<form action='/supermart/manager/crud/delete.php' method='GET' class='deleteform' id='deleteform".$row['id']."'>";
                echo "<input type='submit' value='Delete' class='btn deletebtn' id='delete".$row['id']."'>";
                echo "</form>";
                echo "<button class='btn editbtn' id='edit".$row['id']."'>";
                echo "Edit";
                echo "</button>";
                echo "<div class='productinfo'>";
                echo "<img src='/supermart/".$row['img_url']."' class='image' alt='Product Image'>";
                echo "<div class='name'>".$row['name']."</div>";
                echo "<div class='description'>".$row['description']."</div>";
                echo "<div class='manufacturer'>By ".$row['manufacturer']."</div>";
                echo "<div class='price'>Price: ".$row['price']."</div>";
                echo "<div class='quantity'>Quantity: ".$row['quantity']."</div></div></div>";    
            }
            //testing cookies
            // $ct=count($_COOKIE);
            // $i=0;
            // foreach($_COOKIE as $key=>$value)
            // {
            //     $i++;
            //     if($i==$ct)
            //     {
            //         break;
            //     }
            //     echo $key."=".$value."<br>";
            // }
        }
        else
        {
            echo "Empty query result.";
        }
    }
    else
    {
        die("ERROR: Failed to execute query.");
    }

?>