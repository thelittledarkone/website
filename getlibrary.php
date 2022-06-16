<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM library WHERE user_id='$user_id' AND downloaded='0' AND printer_friendly='0'";
$result = mysqli_query($link, $sql);

if($result){
    if(mysqli_num_rows($result)>0){
        echo "
            <h3>Not Yet Downloaded</h3>
            <table class='table table-condensed mainTable'>";
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $product_id = $row['product_id'];
            $productusername = $row['username'];
            $productpasswd = $row['passwd'];
            
            $sql01 = "SELECT * FROM products WHERE product_id='$product_id'";
            $result01 = mysqli_query($link, $sql01);
            if(mysqli_num_rows($result01)>0){
                $row01 = mysqli_fetch_array($result01, MYSQLI_ASSOC);
                $product_name = $row01['product_name'];
                $product_image = $row01['product_image'];
                $product_source = $row01['product_source'];
            }
            
            echo '                   
                <tr>
                   <td><img src="'.$product_image.'" class="navProfilePic FPic"></td>
                   <td><span>'.$product_name.'</span></td>
                   <td><a class="btn btnDone pull-right downloadpdf" id="'.$product_id.'" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" download="'.$product_name.pdf.'" type="button">DOWNLOAD</a></td>
                   <td><a class="btn btnColor" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" name="gotopdf" type="button" target="_blank">View</a></td>
                </tr>
                ';
                
            
        }
        echo "</table>";
    }else{
        echo "<div class='alert alert-warning'>You have no items to be downloaded!</div>";
    }
}

$sql1 = "SELECT * FROM library WHERE user_id='$user_id' AND downloaded='1' AND printer_friendly='0'";
$result1 = mysqli_query($link, $sql1);

if($result1){
    if(mysqli_num_rows($result1)>0){
        echo "
            <h3>Already Downloaded</h3>
            <table class='table table-condensed mainTable'>";
        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
            $product_id = $row1['product_id'];
            $productusername = $row1['username'];
            $productpasswd = $row1['passwd'];
            
            $sql11 = "SELECT * FROM products WHERE product_id='$product_id'";
            $result11 = mysqli_query($link, $sql11);
            if(mysqli_num_rows($result11)>0){
                $row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC);
                $product_name = $row11['product_name'];
                $product_image = $row11['product_image'];
                $product_source = $row11['product_source'];
            }
            
            echo '                   
                <tr>
                   <td><img src="'.$product_image.'" class="navProfilePic FPic"></td>
                   <td><span>'.$product_name.'</span></td>
                   <td><a class="btn btnDone pull-right downloadpdf" id="'.$product_id.'" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" download="'.$product_name.pdf.'" type="button">reDOWNLOAD</a></td>
                   <td><a class="btn btnColor" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" name="gotopdf" type="button" target="_blank">View</a></td>
                </tr>
                ';
                
            
        }
        echo "</table>";
    }else{
        echo "<div class='alert alert-warning'>You have not downloaded any items yet!</div>";
    }
}

$sql1 = "SELECT * FROM library WHERE user_id='$user_id' AND printer_friendly='1'";
$result1 = mysqli_query($link, $sql1);

if($result1){
    if(mysqli_num_rows($result1)>0){
        echo "
            <h3>Printer Friendly</h3>
            <table class='table table-condensed mainTable'>";
        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
            $product_id = $row1['product_id'];
            $productusername = $row1['username'];
            $productpasswd = $row1['passwd'];
            
            $sql11 = "SELECT * FROM products WHERE product_id='$product_id'";
            $result11 = mysqli_query($link, $sql11);
            if(mysqli_num_rows($result11)>0){
                $row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC);
                $product_name = $row11['product_name'];
                $product_image = $row11['product_image'];
                $product_source = $row11['product_source'];
            }
            
            echo '                   
                <tr>
                   <td><img src="'.$product_image.'" class="navProfilePic FPic"></td>
                   <td><span>'.$product_name.'</span></td>
                   <td><a class="btn btnDone pull-right downloadpdf" id="'.$product_id.'" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" download="'.$product_name.pdf.'" type="button">DOWNLOAD</a></td>
                   <td><a class="btn btnColor" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" name="gotopdf" type="button" target="_blank">View</a></td>
                </tr>
                ';
                
            
        }
        echo "</table>";
    }else{
        echo "<div class='alert alert-warning'>You have not downloaded any items yet!</div>";
    }
}

//$sql1 = "SELECT * FROM library WHERE user_id='$user_id' AND printer_friendly='2'";
//$result1 = mysqli_query($link, $sql1);
//
//if($result1){
//    if(mysqli_num_rows($result1)>0){
//        echo "
//            <h3>High Definition</h3>
//            <table class='table table-condensed mainTable'>";
//        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
//            $product_id = $row1['product_id'];
//            $productusername = $row1['username'];
//            $productpasswd = $row1['passwd'];
//            
//            $sql11 = "SELECT * FROM products WHERE product_id='$product_id'";
//            $result11 = mysqli_query($link, $sql11);
//            if(mysqli_num_rows($result11)>0){
//                $row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC);
//                $product_name = $row11['product_name'];
//                $product_image = $row11['product_image'];
//                $product_source = $row11['product_source'];
//            }
//            
//            echo '                   
//                <tr>
//                   <td><img src="'.$product_image.'" class="navProfilePic FPic"></td>
//                   <td><span>'.$product_name.'</span></td>
//                   <td><a class="btn btnDone pull-right downloadpdf" id="'.$product_id.'" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" download="'.$product_name.pdf.'" type="button">DOWNLOAD</a></td>
//                   <td><a class="btn btnColor" href="https://'.$productusername.':'.$productpasswd.'@thelittledarkone.com/'.$product_source.'" name="gotopdf" type="button" target="_blank">View</a></td>
//                </tr>
//                ';
//                
//            
//        }
//        echo "</table>";
//    }else{
//        echo "<div class='alert alert-warning'>You have not downloaded any items yet!</div>";
//    }
//}


?>