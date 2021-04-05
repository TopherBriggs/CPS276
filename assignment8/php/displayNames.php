<?php

require_once "../classes/Pdo_methods.php";

$ouptut = "";

$pdo = new PdoMethods();

$sql = "SELECT name FROM names ORDER BY name;";


$records = $pdo->selectNotBinded($sql);

$namesList = "";



if($records === "error"){
    $response = (object)[
        "masterstatus" => "error",
        "msg" => "Could not retrieve names database"
    ];
    echo json_encode($response);
}
else {
    foreach($records as $name)
{
    $namesList .= "<p>".implode($name)."</p>";
}
    $response = (object)[
        "masterstatus" => "success",
        "names" => $namesList
    ];
    echo json_encode($response);

}


?>