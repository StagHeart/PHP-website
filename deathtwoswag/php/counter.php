<?php

mysql_query("UPDATE viewCounter SET `views` = `views` +1 WHERE id='3' ");

$sql = mysql_query(" SELECT * FROM viewcounter WHERE id='3'");

while($row = mysql_fetch_array($sql)){
$id = $row["id"];
$pageName = $row["pageName"];
$views = $row["views"];


};

?>