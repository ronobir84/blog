 <?php ob_start() ?>

 <?php include "header.php"; ?>

 <?php
    include "../config.php";

    if (isset($_SESSION['user_data'])) {
        $author_id = $_SESSION['user_data']['0'];
    }
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($config, $sql);
    $blog_id = $_GET['id'];
 
    if (empty($blog_id)) {
        header("Location: index.php");
    }

    $sql2 = "SELECT * FROM  blog LEFT JOIN categories ON blog.category = categories.cat_id LEFT JOIN user ON  blog.author_id = user.user_id  WHERE blog_id = '$blog_id'";
    $query2 = mysqli_query($config, $sql2);
    $result = mysqli_fetch_assoc($query2);


    ?>

 <div class="w-[850px] h-[850px]  bg-gray-500 mx-auto">
     <?php


        ?>

     <a class="duration-500" href="index.php">
         <button class="cursor-pointer duration-200 hover:scale-75 active:scale-75 absolute ml-24 mt-4 title=" Go Back">
             <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="60px" viewBox="0 0 24 24" class="stroke-purple-500">
                 <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
             </svg>
         </button>
     </a>

     <?php



        ?>


     <div class="w-[620px] h-[700px]  mx-auto relative top-20 overflow-hidden  bg-white p-10 mt-8  rounded-lg shadow-md  ">

         <h2 class="text-2xl text-center text-purple-500 font-bold ">Edit Blog</h2>

         <form method="post" enctype="multipart/form-data" action="">
             <div class="">
                 <div class="relative top-2">
                     <!-- <label class="block text-lg font-semibold text-purple-500 absolute -mt-8" for="name">Title</label> -->
                     <input name="blog_title" value="<?php echo $result['blog_title'] ?>" placeholder="Blog Title" class="  text-black border-2 border-gray-300   py-2.5 w-full     focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="text" required>

                 </div>
                 <div class="relative top-5">
                     <!-- <label class="block text-lg font-semibold text-purple-500 absolute -mt-8" for="name"> BLog Body</label> -->
                     <textarea required name="blog_body" id="blog" placeholder="Describe yourself " class="   text-gray-200 border-0  rounded  w-full     focus:ring-purple-400 transition ease-in-out duration-150" rows="3"><?php echo $result['blog_body'] ?></textarea>

                 </div>
                 <div class=" relative top-2 flex items-center  justify-between ">
                     <input class="block  text-sm text-gray-900 border-2 mt-4  border-gray-300 rounded-lg cursor-pointer  dark:placeholder-gray-400" id="file_input" name="blog_image" type="file">
                     <img class="w-14 h-14 rounded-full relative top-3" src="upload/<?php echo $result['blog_image'] ?>">

                 </div>
                 <div class="relative top-5">
                     <!-- <label class="block text-lg font-semibold text-purple-500" for="name">Date</label> -->
                     <select name="category" required class=" border-2 border-gray-300 text-black    py-2.5 w-full  px-3  " id="">

                         <?php
                            while ($cats = mysqli_fetch_assoc($query)) { ?>
                             <option value="<?php echo $cats['cat_id'] ?>" <?php
                                                                            if ($result['category'] == $cats['cat_id']) {
                                                                                echo "selected";
                                                                            } else {
                                                                                echo "";
                                                                            }

                                                                            ?>>


                                 <?php echo $cats['cat_name'] ?>

                             </option>
                         <?php } ?>



                     </select>
                 </div>




                 <div class=" flex justify-end relative top-8">
                     <button class=" bg-purple-600  hover: text-white w-full py-[10px] font-bold   hover:opacity-80" name="edit_blog" type="submit">
                         Update
                     </button>
                 </div>
             </div>
         </form>
     </div>
 </div>




 <?php

    include "../config.php";

    if (isset($_POST['edit_blog'])) {
        $title = mysqli_real_escape_string($config, $_POST['blog_title']);
        $body = mysqli_real_escape_string($config, $_POST['blog_body']);
        $fileName = $_FILES['blog_image']['name'] ?? null;
        $tmp_name = $_FILES['blog_image']['tmp_name'];
        $size = $_FILES['blog_image']['size'];
        $image_ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg'];
        $destination = "upload/" . $fileName;
        $category = mysqli_real_escape_string($config, $_POST['category']);
        if (!empty($fileName)) {
            if (in_array($image_ext, $allow_type)) {
                if ($size <= 2000000) {
                    $unlink = "upload/" . $result['blog_image'];
                    unlink($unlink);
                    move_uploaded_file($tmp_name, $destination);
                    $sql3 = "UPDATE blog SET blog_title='$title', blog_body = '$body', blog_image = '$filename', category='$category', author_id = '$author_id' WHERE blog_id = '$blog_id'";
                    $query3 = mysqli_query($config, $sql3);


                    if ($query3) {
                        $_SESSION['blog_sms'] = "Blog Update  Successful.";
                        header("Location:index.php");
                    } else {

                        $_SESSION['blog_msg'] = "Failed Please try again";
                        header("Location:index.php");
                    }
                } else {

                    $_SESSION['blog_img'] = "image size should be 2mb";
                    header("Location:index.php");
                }
            } else {

                $_SESSION['blog_file'] = "File type is not allow";
                header("Location:index.php");
            }
        } else {
            $sql3 = "UPDATE blog SET blog_title='$title', blog_body = '$body',    category='$category', author_id = '$author_id' WHERE blog_id = '$blog_id'";
            $query3 = mysqli_query($config, $sql3);


            if ($query3) {
                $_SESSION['blog_sms'] = "Blog Update  Successful.";
                header("Location:index.php");
            } else {

                $_SESSION['blog_msg'] = "Failed Please try again";
                header("Location:index.php");
            }
        }
    }

    ?>







 <div class="">
     <?php include "footer.php" ?>
 </div>