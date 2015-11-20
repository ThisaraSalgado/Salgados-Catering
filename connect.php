<?php
error_reporting(0);
$hostname="127.0.0.1";
$username="root";
$password="";
$database="salgadosdb";
$conn=mysql_connect($hostname,$username,$password);
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}else{
    echo "<br>";
    mysql_select_db($database,$conn);
}
?>