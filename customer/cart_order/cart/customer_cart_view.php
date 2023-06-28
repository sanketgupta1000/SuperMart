<?php

    //Connecting to database
    require_once("./../../../helpers/config.php");

    // $count=count($_COOKIE);
    // echo $count;
    // $i=0;
    // var_dump($_COOKIE);
    //Using pid of every cookie object 
    foreach($_COOKIE as $pid=>$quantity)
    {

        if($pid=="PHPSESSID")
        {
            continue;
        }
        // $i++;
        // if($i==$count)
        // {
        //     break;
        // }

        //Constructing query
        $sql="SELECT * FROM `inventory` WHERE `id`=".$pid.";";
        // echo $sql."\n";
        // echo $quantity."\n";

        //Running query
        if($result=mysqli_query($link, $sql))
        {
            $row=mysqli_fetch_array($result);
            echo "<div class='product_card' id='product".$row['id']."'>";
            echo "<img src='/supermart/".$row['img_url']."' class='image' alt='Product Image'>";
            echo "<div class='name'>".$row['name']."</div>";
            echo "<div class='description'>".$row['description']."</div>";
            echo "<div class='manufacturer'>By ".$row['manufacturer']."</div>";
            echo "<div class='price'>Price: ".$row['price']."</div>";
            echo "<div class='quantity'>Available Quantity: ".$row['quantity']."</div>";
            
            echo "<div class='idiv' id='idiv".$row['id']."'>";
            echo "Quantity : ";
            echo "<input type='number' class='iqty' id='iqty".$row['id']."' value='".$_COOKIE[$row['id']]."'>";
            echo "</div>";
            echo "</div>";
        
        }
    }
?>
