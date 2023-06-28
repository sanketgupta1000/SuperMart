<?php
    require_once("./../../helpers/config.php");
    // session_start();
    
    //declaring query string
    $sql="SELECT * FROM `inventory`;";

    if($result=mysqli_query($link, $sql))
    {
        if(mysqli_num_rows($result))
        {
            while($row=mysqli_fetch_array($result))
            {
                echo "<div class='product_card' id='product".$row['id']."'>";
                echo "<img src='/supermart/".$row['img_url']."' class='image' alt='Product Image'>";
                echo "<div class='name'>".$row['name']."</div>";
                echo "<div class='description'>".$row['description']."</div>";
                echo "<div class='manufacturer'>By ".$row['manufacturer']."</div>";
                echo "<div class='price'>Price: ".$row['price']."</div>";
                echo "<div class='quantity'>Available Quantity: ".$row['quantity']."</div>";
                
                if(isset($_COOKIE[$row['id']]))
                {
                    echo "<div class='cartaddbox'>";
                    echo "<label for='cartadd".$row['id']."'>";
                    echo "Add to cart : ";
                    echo "</label>";
                    echo "<input type='checkbox' class='cartadd' id='cartadd".$row['id']."' checked>";
                    echo "</div>";

                    echo "<div class='idiv' id='idiv".$row['id']."'>";
                    echo "Quantity : ";
                    echo "<input type='number' class='iqty' id='iqty".$row['id']."' value='".$_COOKIE[$row['id']]."'>";
                    echo "</div>";
                }
                else
                {
                    echo "<div class='cartaddbox'>";
                    echo "<label for='cartadd".$row['id']."'>";
                    echo "Add to cart : ";
                    echo "</label>";
                    echo "<input type='checkbox' class='cartadd' id='cartadd".$row['id']."'>";
                    echo "</div>";
                }
                echo "</div>";
            }
        }
        else
        {
            echo "Empty query result.";
        }
    }
    else
    {
        echo "Failed to execute query";
    }
?>