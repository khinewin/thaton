<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include('nav_bar.php') ?>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h1 class="text-center">Register</h1>
        <form method="post" action="post_login.php">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>