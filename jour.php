<?php
$row = strtotime("09-09-2023");
$aujo = strtotime(date("Y-m-d"));
$diff = $aujo - $row;
echo floor($diff/(60*60*24));

?>