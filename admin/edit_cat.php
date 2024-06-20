<?php ob_start() ?>
<?php include "header.php" ?>



<?php
include "../config.php";

$id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE cat_id='$id'";
$query = mysqli_query($config, $sql);
$row = mysqli_fetch_assoc($query);
$cat_name = $row['cat_name'];



?>

<div class="w-[600px] h-[500px]  bg-gray-500 mx-auto relative top-10">

    <a class="duration-500" href="categories.php">
        <button class="cursor-pointer duration-200 hover:scale-75 active:scale-75 absolute ml-16 mt-9 title=" Go Back">
            <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="60px" viewBox="0 0 24 24" class="stroke-purple-500">
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
            </svg>
        </button>
    </a>
   


    <div class="w-[450px] h-[300px]  mx-auto relative top-28 overflow-hidden z-10 bg-[#1F2937] p-8 rounded-lg shadow-md  ">

        <h2 class="text-2xl text-center text-gray-300 font-bold mb-6">Edit Category</h2>

        <form method="post" action="">
            <div class="pt-7">
                <div class="mb-4">
                    <!-- <label class="block text-lg font-semibold text-gray-300 " for="name">Category Name</label> -->
                    <input value="<?php echo $cat_name ?>" name="cat_name" placeholder="Category Name" class="bg-gray-700 text-gray-200 border-0  rounded py-3 w-full  focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="text" required>

                </div>



                <div class="flex justify-end">
                    <button class=" bg-purple-600  hover: text-white w-full py-[10px] font-bold   hover:opacity-80" name="update_cat" type="submit">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>




<?php
include "../config.php";
if (isset($_POST['update_cat'])) {
    $cat_name = mysqli_real_escape_string($config, $_POST['cat_name']);
    $sql2 = "UPDATE categories SET cat_name = '$cat_name' WHERE cat_id = '$id'";
    $query2 = mysqli_query($config, $sql2);
    if ($query2) {
         
        $_SESSION['sms'] = "Category Has been Updated Successful";
        header("location:categories.php");
    } else {
         
        $_SESSION['msg'] = "Failed Please try again";
        header("location:categories.php");
    }
}

?>
<div class="relative top-[12%]">
    <?php include "footer.php" ?>
</div>