<?php

$mainList = 4;
$subList = 5;
$output = "";

$output .= "<ul>";
for ($i = 1; $i <= $mainList; $i++)
{
    $output .= "<li>".$i."<ul>";
    for ($j = 1; $j <= $subList; $j++)
    {
        $output .= "<li>".$j."</li>";
    }
    $output .= "</ul></li>";
}

$output .= "</ul>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
</head>
<body>
<?php echo $output;?>
</body>
</html>