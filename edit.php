<?php
include 'auth.php';
include 'config.php';
$id=$_GET['id'];
$books=new Books();
$book=$books->getBookById($id);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include('nav_bar.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit Book Data</div>
                <div class="panel-body">
                    <form method="post" action="post_update_book.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                            <label for="book_name" class="control-label">Book name</label>
                            <input value="<?php echo $book['book_name'] ?>" type="text" name="book_name" id="book_name" class="form-control" placeholder="Book Name">
                        </div>
                        <div class="form-group">
                            <label for="book_cover" class="control-label">Book Cover</label>
                            <input style="height: auto" type="file" name="book_cover" id="book_cover" class="form-control" placeholder="Book Cover">
                        </div>
                        <div class="form-group">
                            <label for="book_file" class="control-label">Book File</label>
                            <input type="file" name="book_file" id="book_file" class="form-control" style="height: auto">
                        </div>
                        <div class="form-group">
                            <label for="cat_id" class="control-label"></label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">Select Category</option>
                                <?php

                                $cat_row=new Books();
                                $cats=$cat_row->getCategory();
                                foreach ($cats as $cat):
                                    ?>
                                    <option <?php if($book['cat_id']==$cat['id']) { echo "selected"; } ?> value="<?php echo $cat['id'] ?>"><?php echo $cat['cat_name'] ?></option>
                                <?php
                                endforeach;

                                ?>
                            </select>
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
