<?php
require_once "classes/Pdo_methods.php";
$output = "<ul>";

$pdo = new PdoMethods();
$sql = "SELECT * FROM files ORDER BY name;";

$records = $pdo->selectNotBinded($sql);

foreach ($records as $row)
{
    $output .= '<li><a target="_blank" href='.$row["path"].'>'.$row["name"].'</a></li>';
}

$output .= "</ul>";
?>