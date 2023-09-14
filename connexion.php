<?php

$hn='localhost';
$un='root';
$db='mescoursenligne';
$pw='';

$conn= mysqli_connect($hn,$un,$pw,$db);
if(!$conn)
{
die('Could not Connect My Sql:' .mysql_error());

}

?>

