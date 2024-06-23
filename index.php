<?php include "./partials/header.php" ?>

<?php

include "config.php";

$sql = "SELECT * FROM blog LEFT JOIN categories ON  blog.category = categories.cat_id LEFT JOIN user ON blog.author_id = user.user_id ORDER BY blog.publish_date DESC";
$run = mysqli_query($config, $sql);
$row = mysqli_num_rows($run);

?>



<div class="relative top-36">

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
                            <img src="admin/upload/<?php echo $image ?>" alt="">
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
                                <a class="" href="">
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


        <div>
            <!-- <h2 class="text-3xl text-black font-bold absolute -top-12">Categories</h2> -->
            <!-- sidebar -->
            <div class="w-[470px] h-40 border    shadow-xl  ">
                <div class="flex gap-4 relative top-6 items-center px-3">
                    <div>
                        <img class="w-40 h-28 bg-cover" src="images/01HWZY72AXXZ2B84XF0M2PV9QZ.png" alt="">
                    </div>
                    <div>
                        <h3 class="text-xl text-gray-900 font-bold">Laravel 10.9 release update</h3>
                        <p class="text-lg font-semibold text-gray-700">The Laravel team has recently unveiled version 10.9, which includes...</p>
                    </div>
                </div>
            </div>
            <div>
                <!-- <h2 class="text-3xl text-black font-bold relative top-6   ">Recent Post</h2> -->
                <div class="w-[470px] h-[400px] border-4 border-black relative top-10 shadow-xl  ">
                    <div>

                    </div>

                </div>
            </div>
        </div>



    </div>

</div>





<?php include "./partials/footer.php" ?>