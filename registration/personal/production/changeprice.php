<?php
session_start();
$k=1;
$id=array();
$prise=array();
for($i=1; $i<10000000; $i++)
{
    if(isset($_REQUEST["name$i"]))
    {
        if($_REQUEST["text$i"])
        {
        $id[$k]=$_REQUEST["name$i"];
        $prise[$k]=$_REQUEST["text$i"];
        $k=$k+1;
        }
    }
}

for($n=1; $n<$k; $n++)
{
        include_once('connect.php');
    $intid=(int)$id[$n];
    $prise1=(int)$prise[$n];
    $pro=$_SESSION['user'];
        $sql="UPDATE link SET price='$prise1' WHERE idPharmacy='$pro' AND idDrug='$intid'" ;
        if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
    
include ("changetheprice.php"); 


?>