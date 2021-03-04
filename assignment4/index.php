<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 4</title>
</head>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<body>
<div class="container m-3 mx-auto">
    <div class="row">
        <h1>Add Names</h1>
    </div>
    <form method="POST" action="#">
         <div>
           <input class="btn btn-primary" type="submit" value="Add Names">
           <input class="btn btn-danger" type="reset" value="Clear Names">
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="Name" class="form-label">Enter Name</label>
                <input type="text" name="name" class="form-control" id="Name" aria-describedby="Name">
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="NamesList" class="form-label">List of Names</label>
                <textarea name="nameList" class="form-control" id="NamesList" aria-describedby="NamesList" rows="10" style="height: 450px"></textarea>
            </div>
        </div>
    </form>
</div>
</body>
</html>