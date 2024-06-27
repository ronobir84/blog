<?php ob_start()?>
<?php include "./partials/header.php" ?>

<?php

include "config.php";
$id = $_GET['id'];
if (empty($id)) {
    header("Location:index.php");
}

$sql = "SELECT * FROM blog LEFT JOIN categories ON  blog.category = categories.cat_id LEFT JOIN user ON blog.author_id = user.user_id WHERE cat_id = '$id' ORDER BY blog.publish_date DESC";
$run = mysqli_query($config, $sql);
$row = mysqli_num_rows($run);

?>



<div class="relative top-">

    <!-- min body -->
    <div class=" flex justify-between px-[70px]">
        <!-- <h2 class="text-3xl text-black font-bold absolute -top-12 ">Recent Post</h2> -->
        <div>

            <?php
            if ($row) {
                while ($result = mysqli_fetch_assoc($run)) {
            ?>



                    <div class="max-w-5xl  h-[760px]   bg-[#FFFFFF] shadow-xl mt-10  transition ease-in-out delay-150 hover:-translate-y-3 hover:scale-100 duration-500">
                        <div>
                            <?php $image =  $result['blog_image'] ?>
                            <a href="single_post.php?id=<?php echo $result["blog_id"] ?>">
                                <img class="min-card-img" src="admin/upload/<?php echo $image ?>" alt="">
                            </a>
                        </div>
                        <div class="px-14">
                            <div class="relative top-4">
                                <div class="flex justify-between">
                                    <?php $date = $result['publish_date'] ?>
                                    <h3 class="text-lg text-gray-600  font-semibold">Published on <?php echo date("F   jS  Y", strtotime($date)) ?> </h3>
                                    <div class="flex gap-3">
                                        <p class="text-lg text-gray-600  font-semibold"> Author : <?php echo ucwords($result['username']) ?></p>
                                        |
                                        <p class="text-lg text-gray-600  font-semibold">Category : <?php echo $result['cat_name'] ?></p>
                                    </div>
                                </div>
                                <a class="" href="single_post.php?id=<?php echo $result["blog_id"] ?>">
                                    <span class="text-3xl text-black font-bold relative hover:underline duration-500 top-2"> <?php echo ucwords($result["blog_title"]) ?> </span>
                                </a>
                            </div>
                        </div>

                        <div class="px-14">
                            <div class=" relative top-12  ">
                                <div class="flex justify-between relative  ">
                                    <div>
                                        <button class="border-2 px-5 py-2 bg-gray-200 rounded-full">
                                            <i class="fa-regular fa-eye text-base pr-1"></i>
                                            0 Views
                                        </button>
                                    </div>
                                    <div>
                                        <button class="border-2 px-5 py-2 bg-gray-200 rounded-full">
                                            <i class="fa-regular fa-thumbs-up text-base pr-1"></i>

                                            0 Votes
                                        </button>
                                    </div>
                                    <div>
                                        <button class="border-2 px-5 py-2 bg-gray-200 rounded-full">

                                            <i class="fa-regular fa-comment text-base pr-1"></i>
                                            0 Comments
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  }
            } ?>
        </div>



        <?php include "sidebar.php" ?>



    </div>

</div>





<?php include "./partials/footer.php" ?>