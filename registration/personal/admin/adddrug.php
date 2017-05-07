<?php
include_once('connect.php');
$checknumber=0;
$nameckeck=$_REQUEST["name"];
$sqlcheck="SELECT p.id, p.product, p.price FROM product p";
$result=mysqli_query($conn, $sqlcheck);
 while($row=mysqli_fetch_assoc($result))
 {
     if($nameckeck==$row["product"])
     {
     $checknumber=1;    
     }
 }
if($checknumber==0)
{
if(isset($_REQUEST["name"]))
    {
        if(isset($_REQUEST["price"]))
        {
        $name=$_REQUEST["name"];
        $price=$_REQUEST["price"];
         $sql="INSERT INTO product SET product='$name', price='$price'" ;
    
        if ($conn->query($sql) === TRUE) {
    
               } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
        include ("adminaddproduct.php");
        }
    }
}
else {
  include ("adminaddproduct.php");
}
