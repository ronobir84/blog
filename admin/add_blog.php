 <?php ob_start() ?>

 <?php include "header.php"; ?>

 <?php
    include "../config.php";

    if (isset($_SESSION['user_data'])) {
        $author_id = $_SESSION['user_data']['0'];
    }
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($config, $sql);

    ?>

 <div class="w-[850px] h-[850px]  bg-gray-500 mx-auto">
     <?php
        if (isset($_SESSION['error_sms'])) {
            $er_sms = $_SESSION['error_sms'];
            echo "<span class='text-xl font-semibold text-green-700 absolute  right-[35%] mt-4'>" . $er_sms . "</span>";
            unset($_SESSION['error_sms']);
        }
        if (isset($_SESSION['error_msg'])) {
            $er_msg = $_SESSION['error_msg'];
            echo "<span class='text-xl font-semibold text-red-700 absolute  right-[35%] mt-4'>" . $er_msg . "</span>";
            unset($_SESSION['error_msg']);


        }
        if (isset($_SESSION['error_file'])) {
            $er_file = $_SESSION['error_file'];
            echo "<span class='text-xl font-semibold text-red-700 absolute  right-[35%] mt-4'>" . $er_file . "</span>";
            unset($_SESSION['error_file']);


        }
        if (isset($_SESSION['error_img'])) {
            $er_img= $_SESSION['error_img'];
            echo "<span class='text-xl font-semibold text-red-700 absolute  right-[35%] mt-4'>" . $er_img . "</span>";
         unset($_SESSION['error_img']);


        }

        ?>

     <a class="duration-500" href="index.php">
         <button class="cursor-pointer duration-200 hover:scale-75 active:scale-75 absolute ml-24 mt-2 title=" Go Back">
             <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="60px" viewBox="0 0 24 24" class="stroke-purple-500">
                 <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
             </svg>
         </button>
     </a>




     <div class="w-[620px] h-[700px]  mx-auto relative top-20 overflow-hidden  bg-white p-10 mt-10  rounded-lg shadow-md  ">

         <h2 class="text-2xl text-center text-purple-500 font-bold mb-2">Publish Blog</h2>

         <form method="post" enctype="multipart/form-data" action="">
             <div class="pt-1">
                 <div class="">

                     <input name="blog_title" placeholder="Blog Title" class="  text-black border-2 border-gray-300   py-2.5 w-full     focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="text" required>

                 </div>
                 <div class="relative top-3">
                     <!-- <label class="block text-lg font-semibold text-gray-300 " for="name">Category Name</label> -->
                     <textarea required name="blog_body" id="blog" placeholder="Describe yourself " class="   text-gray-200 border-0  rounded  w-full     focus:ring-purple-400 transition ease-in-out duration-150" rows="3"></textarea>
                 </div>
                 <div>
                     <!-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label> -->
                     <input required class="block w-full text-sm text-gray-900 border-2 mt-4  border-gray-300 rounded-lg cursor-pointer  dark:placeholder-gray-400" id="file_input" name="blog_image" type="file">
                 </div>
                 <div class="relative top-4">
                     <select name="category" required class=" border-2 border-gray-300 text-black    py-2.5 w-full  px-3  " id="">
                         <option value="">Select Category</option>
                         <?php
                            while ($cats = mysqli_fetch_assoc($query)) { ?>
                             <option value="<?php echo $cats['cat_id'] ?>"><?php echo $cats['cat_name'] ?></option>
                         <?php } ?>



                     </select>

                 </div>



                 <div class="flex justify-end relative top-8">
                     <button class=" bg-purple-600  hover: text-white w-full py-[10px] font-bold   hover:opacity-80" name="add_blog" type="submit">
                         Add
                     </button>
                 </div>
             </div>
         </form>
     </div>
 </div>

 <?php



    if (isset($_POST['add_blog'])) {
        $title = mysqli_real_escape_string($config, $_POST['blog_title']);
        $body = mysqli_real_escape_string($config, $_POST['blog_body']);
        $fileName = $_FILES['blog_image']['name'];
        $tmp_name = $_FILES['blog_image']['tmp_name'];
        $size = $_FILES['blog_image']['size'];
        $image_ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allow_type = ['jpg', 'png', 'jpeg'];
        $destination = "upload/" . $fileName;
        $category = mysqli_real_escape_string($config, $_POST['category']);
        if (in_array($image_ext, $allow_type)) {
            if ($size <= 2000000) {
                move_uploaded_file($tmp_name, $destination);
                $sql2 = "INSERT INTO blog(  blog_title,  blog_body, blog_image, category , author_id) VALUES('$title', '$body', '$fileName', '$category', '$author_id')";
                $query2 = mysqli_query($config, $sql2);


                if ($query2) {
                    $_SESSION['error_sms'] = "Blog Published Successful.";
                 header("Location:add_blog.php");
                } else {

                    $_SESSION['error_msg'] = "Failed Please try again";
                 header("Location:add_blog.php");
                }
            } else {
                 
                $_SESSION['error_img'] = "image size should be 2mb";
                header("Location:add_blog.php");
            }
        } else {

            $_SESSION['error_file'] = "File type is not allow";
            header("Location:add_blog.php");


        }
    }

    ?>







 <div class="">
     <?php include "footer.php" ?>
 </div>