<?php
require_once 'directories.php';
$output = "";

if(count($_POST) > 0){

    $FileMake = new Directories();
    if ($FileMake->makeFiles())
    {
        $output .= "<h6>File and directory where created</h6>";
        $output .= "<a href=".$FileMake->linkFiles().">Path were file is located</a>";
    }
    else
    {
        $output .= "<p>A directory already exists with that name</p>";
    }
}

?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment5</title>
</head>
<body>
    <div class="container m-3 mx-auto">
    <div class="row">
        <h1>File and Directory Assignment</h1>
    </div>
    <div class="row mb-3">
        <h6>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</h6>
    </div>
    <div class="row mb-3">
        <?php echo $output; ?>
    </div>
    <form method="POST" action="#">

        <div class="row">
            <div class="mb-3">
                <label for="Name" class="form-label">Folder Name</label>
                <input type="text" name="name" class="form-control" id="Name" aria-describedby="Name">
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="content" class="form-label">File Content</label>
                <textarea name="contents" class="form-control" id="content" aria-describedby="content" rows="5" style="height: 300px"></textarea>
            </div>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" id="Submit" value="Submit">
        </div>
    </form>
    </div>
</body>
</html>