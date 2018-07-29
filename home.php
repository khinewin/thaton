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
    <title>Home</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include('nav_bar.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Books List</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>Book Name</td>
                            <td>Book Cover</td>
                            <td>Book File</td>
                            <td>Category</td>
                            <td>Created Date</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <?php
                        include 'config.php';
                        $books=new Books();
                        $book=$books->getBooks();
                        foreach ($book as $row):
                            ?>
                        <tr>
                            <td><?php echo $row['book_name'] ?></td>
                            <td><img src="book_covers/<?php echo $row['book_cover'] ?>" style="width: 60px"></td>
                            <td><a href="book_files/<?php echo $row['book_file'] ?>">Download</a></td>
                            <td><?php echo $row['cat_name'] ?></td>
                            <td><?php echo date('d-m-Y / h:i A', strtotime($row['created_at'])) ?></td>
                            <td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                            <td><a href="delete.php?book_name=<?php echo $row['book_name'] ?>">Delete</a></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>


        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">New Book</div>
                <div class="panel-body">
                    <form method="post" action="post_book.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="book_name" class="control-label">Book name</label>
                            <input type="text" name="book_name" id="book_name" class="form-control" placeholder="Book Name">
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
                                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['cat_name'] ?></option>
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
