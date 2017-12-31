<?php 
$s = $_FILES['archivo']['size'];
$n = $_FILES['archivo']['name'];
$t = $_FILES['archivo']['type'];
$tp = $_FILES['archivo']['tmp_name'];
echo $s;
echo "<br>".$n;
echo "<br>".$t;
echo "<br>".$tp;
?>