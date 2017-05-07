<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	$name="localhost";
                $username="root";
                $password="root";
            $dbname="pharmacydb";
            $conn=mysqli_connect($name, $username, $password, $dbname);
            if(!$conn){
                die("Connection failed: ". mysqli_connect_error());
            }