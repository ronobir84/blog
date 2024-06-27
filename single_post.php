<?php ob_start() ?>

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
<style>
    .min-second-card {
        width: 470px;
        height: 150px;
        border: 1px solid #DBEAFE;

        box-shadow: 3px 3px 3px 3px gainsboro;
    }

    .second-h2 {
        font-weight: 800;
        font-size: 23px;
        text-transform: uppercase;
        /* font-family: "Noto Serif", serif; */
    }

    .px-item {
        padding-left: 40px;
        padding-right: 40px;
    }

    .class-php {
        padding: 10px 22px 10px 22px;
        background-color: #DBEAFE;
        font-size: 18px;
        font-weight: 700;
        border: none;
        color: #1E40AF;

        cursor: pointer;
    }

    .grid-item {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr))
    }
</style>

<body>

    <?php
    include "config.php";
    $id = $_GET['id'];
    if (empty($id)) {
        header("Location:index.php");
    }
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
                            <?php echo $post["blog_title"] ?></h3>
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
                        <?php $image = $post["blog_image"] ?>
                        <img class="min-card-img" src="admin/upload/<?php echo $image ?>" alt="">
                    </div>
                    <div>
                        <div class="style-space">
                            <div class="title-h1">
                                <h1 class="h1-title"><?php echo $post["blog_title"] ?></h1>
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
                                <?php $date = $post['publish_date'] ?>
                                <h3 class="second-h2-title">By <span class="username"><?php echo ucwords($post['username']) ?></span> Published on <?php echo date("F   jS  Y", strtotime($date)) ?></h3>
                            </div>
                            <div class="min-all-text">

                                <h3 class="second-h2-title"><?php echo $post["blog_body"] ?></h3>

                            </div>

                        </div>
                    </div>

                </div>
                <!-- second card -->
                <div class="min-second-card">
                    <div class="px-item">
                        <div>
                            <h2 class="second-h2">Category Name</h2>
                        </div>
                        <div class="grid-item">
                            <a href="">
                                <button class="class-php"><i class="fa-solid fa-hashtag"></i><?php echo $post["cat_name"] ?></button>
                            </a>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>




    </div>







</body>

</html>