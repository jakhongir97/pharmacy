<?php
$l=1;
$k=1;
include_once('connect.php');

if(isset($_REQUEST["button"]))
{
        
for($i=1; $i<100000; $i++)
{
    if(isset($_REQUEST["id$i"]))
    {
        $iddelete[$l]=$_REQUEST["id$i"];
        $l=$l+1;
    }
    if(isset($_REQUEST["name$i"]))
    {
        $userid[$k]=$_REQUEST["name$i"];
        $k=$k+1;
    }
}
for($m=1; $m<$l; $m++)
{
    $intId=(int)$iddelete[$m];
    $sqldelete="DELETE FROM pharmacy WHERE UserId='$intId'";
    $doit=mysqli_query($conn, $sqldelete);
        if ($conn->query($sqldelete) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$notactive=0;
$sql1="UPDATE pharmacy SET UserActivation='$notactive'";
$res1=mysqli_query($conn, $sql1);
        if ($conn->query($sql1) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
for($n=1; $n<$k; $n++)
{
        
    $int=(int)$userid[$n]; 
    $active=1;
        $sql="UPDATE pharmacy SET UserActivation='$active'  WHERE UserId='$int' " ;
    $res=mysqli_query($conn, $sql);
        if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
    
 include ("adminuseractiv.php");   

?>