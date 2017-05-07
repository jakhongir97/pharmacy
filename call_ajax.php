<?php
include('config.php');
$s1=$_REQUEST["n"];
$select_query="select * from product where product like '%".$s1."%'";
$sql=mysql_query($select_query) or die (mysql_error());
$s="";
while($row=mysql_fetch_array($sql))
{
    
	$s=$s."
	<a class='link-p-colr' href='index_en.php?product=".$row['product']."'>
		<div class='live-outer'>
            	
                <div class='live-product-det'>
                	<div class='live-product-name'>
                    	<p>".$row['product']."</p>
                    </div>
                    
                </div>
            </div>
	</a>
	"	;
}
echo $s;

?>
