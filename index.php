<?php
session_start();
include 'public_config.php'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include('nav_bar.php') ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Search On App</div>
                <div class="panel-body">
                    <form class="navbar-form" method="get" action="index.php">
                        <div class="form-group">
                            <input name="book_name" type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php
                        $get_cat=new MyPublic();
                        $cats=$get_cat->getCategory();
                        foreach ($cats as $cat):
                            ?>
                            <li class="list-group-item"><a href="index.php?cat_id=<?php echo $cat['id']; ?>"><?php echo $cat['cat_name'] ?></a></li>

                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>

        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Books</div>
                <div class="panel-body">
                    <?php
                    $book_name=$_GET['book_name'];
                    $cat_id=$_GET['cat_id'];

                    if($book_name){
                        $books=$get_cat->searchBook($book_name);
                    }else{
                        $books=$get_cat->getBooks($cat_id);
                    }

                    foreach ($books as $book):
                        ?>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="book_covers/<?php echo $book['book_cover'] ?>" style="width: 150px; height: 150px" class="img-circle">
                            <h3 class="text-center text-primary"><?php echo $book['book_name'] ?></h3>
                            <p>Upload On : <?php echo date('D-m-Y', strtotime($book['created_at'])) ?></p>
                            <a class="btn btn-primary btn-block" href="book_files/<?php echo $book['book_file'] ?>">Download</a>
                        </div>
                    </div>

                    <?php
                    endforeach;
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>