<?php

$sql = mysql_query(" SELECT * FROM video");
$i = 1;
while($row = mysql_fetch_array($sql)){
    $vid_id[$i] = $row["id"];
    $vid_name[$i] = $row["name"];
    $vid_file_name[$i] = $row["file_name"];
    $i++;
};

function get_video($name) {
	$query = mysql_query("SELECT * FROM video WHERE name='$name'");
	if ($row = mysql_fetch_array($query))
		return $row["file_name"];
	return "null";
}

?>