<?php
$sql = mysql_query(" SELECT * FROM picture ");
$i = 1;
while($row = mysql_fetch_array($sql)){
    $pic_id[$i] = $row["id"];
    $pic_name[$i] = $row["name"];
    $pic_file_name[$i] = $row["file_name"];
    $i++;
};

function get_picture($name) {
	$query = mysql_query("SELECT * FROM picture WHERE name='$name'");
	if ($row = mysql_fetch_array($query))
		return $row["file_name"];
	return "null";
}

?>