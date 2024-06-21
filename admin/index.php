 <?php include "header.php" ?>
 <?php
   global $user_id;
   if (isset($_SESSION['user_data'])) {
      $user_id = $_SESSION['user_data']['0'];
   }


   ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <h5 class="mb-2 text-black text-lg font-semibold">Blog Posts</h5>
    <!-- DataTales Example -->
    <div class="card shadow">
       <div class="card-header py-3 d-flex justify-content-between">
          <div>
             <a href="add_blog.php">
                <button class="  absolute   overflow-hidden  w-36 h-12 cursor-pointer flex items-center border border-purple-600 bg-purple-600 group hover:bg-purple-600 active:bg-purple-600 active:border-purple-600">
                   <span class="text-gray-200 font-semibold ml-8 transform group-hover:translate-x-20 transition-all duration-300">Add Blog</span>
                   <span class="absolute right-0 h-full w-10 rounded-lg bg-purple-600 flex items-center justify-center transform group-hover:translate-x-0 group-hover:w-full transition-all duration-300">
                      <svg class="svg w-8 text-white" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                         <line x1="12" x2="12" y1="5" y2="19"></line>
                         <line x1="5" x2="19" y1="12" y2="12"></line>
                      </svg>
                   </span>
                </button>

             </a>
          </div>
          <div>
             <?php

               if (isset($_SESSION['error_blog'])) {
                  $blog = $_SESSION['error_blog'];
                  echo "<span class='text-xl font-semibold text-green-700 relative top-2 left-[20%]'>" . $blog . "</span>";
                  unset($_SESSION['error_blog']);
               }

               if (isset($_SESSION['blog_sms'])) {
                  $blog_error = $_SESSION['blog_sms'];
                  echo "<span class='text-xl font-semibold text-green-700 relative left-[20%] top-2'>" . $blog_error . "</span>";
                  unset($_SESSION['blog_sms']);
               }
               if (isset($_SESSION['blog_msg'])) {
                  $blog_msg = $_SESSION['blog_msg'];
                  echo "<span class='text-xl font-semibold text-red-700  relative left-[20%] top-2'>" . $blog_msg . "</span>";
                  unset($_SESSION['blog_msg']);
               }
               if (isset($_SESSION['blog_file'])) {
                  $blog_file = $_SESSION['blog_file'];
                  echo "<span class='text-xl font-semibold text-red-700  relative left-[20%] top-2'>" . $blog_file . "</span>";
                  unset($_SESSION['blog_file']);
               }
               if (isset($_SESSION['blog_img'])) {
                  $blog_img = $_SESSION['blog_img'];
                  echo "<span class='text-xl font-semibold text-red-700 relative left-[20%] top-2'>" . $blog_img . "</span>";
                  unset($_SESSION['blog_img']);
               }

               ?>
          </div>
          <div>
             <form class="navbar-search">
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                   <div>
                      <input class="bg-slate-50   font-mono  ring-zinc-400    outline-none duration-300 placeholder:text-zinc-600 placeholder:opacity-50   px-8 py-2  focus:shadow-lg  border-2 border-purple-500   " placeholder="Search" name="text" type="search" />

                   </div>
                   <div>
                      <div class=" relative right-[24.4px] bg-transparent items-center justify-center flex border-2 border-purple-500   cursor-pointer active:scale-[0.98]">
                         <button class="px-6 py-2 hover:bg-purple-500 text-purple-500 hover:text-white duration-300 ">Search</button>
                      </div>

                   </div>

                </div>
             </form>
          </div>
       </div>
       <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                   <tr>
                      <th><span class="text-xl text-purple-500 font-bold">Sr.No</span></th>
                      <th><span class="text-xl text-purple-500 font-bold">Title</span></th>
                      <th><span class="text-xl text-purple-500 font-bold">Category</span></th>
                      <th><span class="text-xl text-purple-500 font-bold">Author</span></th>
                      <th><span class="text-xl text-purple-500 font-bold">Date</span></th>
                      <th colspan="2"><span class="text-xl text-purple-500 font-bold">Action</span></th>
                   </tr>
                </thead>
                <tbody>

                   <?php
                     include "../config.php";

                     $sql = "SELECT * FROM  blog LEFT JOIN categories ON blog.category = categories.cat_id LEFT JOIN user ON  blog.author_id = user.user_id WHERE user_id = '$user_id'   ORDER BY  blog.publish_date DESC";

                     // $sql = "SELECT * FROM blog "; 
                     $query = mysqli_query($config, $sql);

                     $rows = mysqli_num_rows($query);

                     if ($rows) {
                        while ($result = mysqli_fetch_assoc($query)) {
                     ?>
                         <tr>
                            <td class="text-lg text-black font-semibold"><?php echo $result['blog_id'] ?></td>
                            <td class="text-lg text-black font-semibold"><?php echo $result['blog_title'] ?></td>
                            <td class="text-lg text-black font-semibold"><?php echo $result['cat_name'] ?></td>
                            <td class="text-lg text-black font-semibold"><?php echo $result['username'] ?></td>
                            <td class="text-lg text-black font-semibold"><?php echo date("d-m-Y", strtotime($result['publish_date'])) ?></td>
                            <td class=" ">

                               <form method="post" action="" onsubmit="return confirm('Are You Sure You want to delete?')">
                                  <a class="relative right-3" href="edit_blog.php?id=<?php echo $result['blog_id'] ?>">
                                     <i class="fa-solid fa-user-pen text-lg  w-12 h-12  p-2  duration-500 hover:bg-purple-500 border-2 border-purple-500 hover:text-white  text-purple-500 rounded-full"></i>
                                  </a>
                                  <input name="blogId" value="<?php echo $result['blog_id'] ?>" type="hidden">
                                  <input name="blogImage" value="<?php echo $result['blog_image'] ?>" type="hidden">

                                  <button class="" name="deleteBlog" value="delete"> <i class="fa-solid fa-trash text-lg  w-12 h-12  p-2  duration-500 hover:bg-red-700 border-2 border-red-700 hover:text-white  text-red-700 rounded-full"></i></button>

                               </form>
                            </td>

                         </tr>


                      <?php
                        }
                     } else {

                        ?>

                      <tr>
                         <td colspan="7">
                            No Record Found
                         </td>

                      </tr>




                   <?php



                     }




                     ?>
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
 <!-- /.container-fluid -->
 </div>


 <?php
   if (isset($_POST['deleteBlog'])) {
      $id = $_POST['blogId'];
      $image = "upload/" . $_POST['blogImage'];

      $delete = "DELETE FROM blog WHERE blog_id = '$id'";
      $run = mysqli_query($config, $delete);
      if ($run) {
         unlink($image);
         $_SESSION['error_blog'] = "Blog Has been Deleted Successful.";
         echo "<script>window.location.href='index.php'</script>";
      } else {
         echo "Failed Please Try Again";
      }
   }

   ?>

 <?php include "footer.php" ?>