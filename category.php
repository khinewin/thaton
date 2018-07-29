<?php
include 'auth.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include('nav_bar.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Category List</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Category Name</td>
                        </tr>
                        <?php
                        include 'config.php';
                        $cats=new Books();
                        $cat=$cats->getCategory();
                        foreach ($cat as $row):
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['cat_name'] ?></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">New Category</div>
                <div class="panel-body">
                    <form method="post" action="post_category.php">
                        <div class="form-group">
                            <input type="text" name="cat_name" class="form-control" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
