<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Playwrite+AU+VIC:wght@100..400&family=Playwrite+NZ:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php
    include "config.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM blog LEFT JOIN categories ON  blog.category = categories.cat_id LEFT JOIN user ON blog.author_id = user.user_id WHERE blog_id = '$id'";
    $run = mysqli_query($config, $sql);

    $post = mysqli_fetch_assoc($run);

    ?>
    <div class="">
        <div class="min-div-1">
            <div class="text-min">

                <h1 class="min-h1">WEB DEVELOPMENT HANDBOOK</h1>
                <h3 class="min-h3">Development is fun in a funny way</h3>

            </div>
        </div>
        <!-- <hr> -->
        <div class="min-div-2">
            <div class="second-item">
                <div class="min-div-3">
                    <i class="fa-solid fa-chevron-right icon-min"></i>
                    <h3 class="h3-min">All Post</h3>
                    <i class="fa-solid fa-chevron-right icon-min"></i>
                    <a class="a-1" href="">
                        <h3 class="title-text">
                             <?php echo $post["blog_title"]?></h3>
                    </a>
                </div>
            </div>

        </div>


        <!-- card item -->
        <div class="min-card-con">
            <div class="tooltip">
                <a href="index.php">
                    <button><i class="fa-solid fa-house"></i></button>
                </a>
                <div class="tooltiptext">BACK TO HOME!</div>
            </div>
            <div class="card-div-flex">
                <!-- first card -->
                <div class="min-card">
                    <div>
                        <?php $image = $post["blog_image"]?>
                        <img class="min-card-img" src="admin/upload/<?php echo $image?>" alt="">
                    </div>
                    <div>
                        <div class="style-space">
                            <div class="title-h1">
                                <h1 class="h1-title"><?php echo $post["blog_title"]?></h1>
                            </div>
                            <hr>
                            <div class="icon-min-flex">
                                <button class="icon-button">
                                    <i class="fa-regular fa-eye icon"></i>
                                    0 Views
                                </button>
                                <button class="icon-button">
                                    <i class="fa-regular fa-thumbs-up icon "></i>
                                    0 Votes
                                </button>
                                <button class="icon-button">
                                    <i class="fa-regular fa-comment icon"></i>
                                    0 Comments
                                </button>
                                <button class="icon-button">
                                    <i class="fa-solid fa-arrow-up-from-bracket icon"></i>

                                    0 Share
                                </button>
                            </div>
                            <hr>
                        </div>

                        <div class="second-item-2">
                            <div>
                                <h3 class="second-h2-title">By <span>Author</span> Published on May 15th 2023</h3>
                            </div>
                            <div class="min-all-text">

                                <h3 class="second-h2-title"><?php echo $post["blog_body"]?></h3>

                            </div>

                        </div>
                    </div>

                </div>
                <!-- second card -->
                <div class="min-card-2">


                </div>

            </div>
        </div>




    </div>







</body>

</html>