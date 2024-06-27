<?php
$select = "SELECT * FROM  categories";
$query = mysqli_query($config, $select);
$rows = mysqli_num_rows($query);

// resent post 
$select2 = "SELECT * FROM  blog  ORDER BY publish_date DESC LIMIT 4";
$query2 = mysqli_query($config, $select2);
?>



<div>


    <div class="w-[470px]  border  relative top-10 pt-7 pb-9  shadow-xl  ">

        <div class="px-10">
            <div>
                <h1 class="text-2xl font-bold text-black pl-6 cat_font uppercase">Category</h1>
            </div>
            <div>

                <div class="grid grid-cols-2  gap-5 px-6 pt-4">
                    <?php
                    if ($rows) {
                        while ($result = mysqli_fetch_assoc($query)) {


                    ?>
                            <div class="">

                                <a href="category.php?id=<?php echo $result["cat_id"] ?>" class=" px-4 py-[5px]  relative  bg-[#DBEAFE] font-bold text-lg text-[#1E40AF]" href="">
                                    <i class="fa-solid fa-hashtag"></i><?php echo $result["cat_name"] ?>
                                </a>

                            </div>
                    <?php }
                    } ?>


                </div>



            </div>
        </div>



    </div>
    <div>

        <h2 class="text-2xl font-bold  text-black pt-7  cat_font uppercase relative top-10">Recent Post</h2>
        <div class=" ">
            <?php
            while ($posts = mysqli_fetch_assoc($query2)) {


            ?>
                <div class="w-[470px] h-[130px] bg-white border relative top-16  shadow-xl transition ease-in-out delay-150 hover:-translate-y-2 hover:scale-100 duration-500">

                    <div class="flex  gap-3 items-center px-2 relative top-6 mt-2">
                        <div class="">
                            <?php $image =  $posts['blog_image'] ?>
                            <a class="" href="single_post.php?id=<?php echo $posts["blog_id"] ?>">
                                <img class="hover:opacity-70 w-44 h-20" src="admin/upload/<?php echo $image ?>" alt="">
                            </a>
                        </div>
                        <div>
                            <a href="single_post.php?id=<?php echo $posts["blog_id"] ?>">
                                <h2 class="text-xl font-bold text-black hover:underline duration-500"><?php echo $posts["blog_title"] ?></h2>
                            </a>
                        </div>
                    </div>

                </div>
            <?php
            }
            ?>

        </div>
    </div>


</div>