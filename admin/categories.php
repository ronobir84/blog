<?php include "header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h5 class="mb-2 text-black text-lg font-semibold">Categories</h5>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between">
            <div>
                <a href="add_cat.php">
                    <button class="  absolute   overflow-hidden  w-36 h-12 cursor-pointer flex items-center border border-purple-600 bg-purple-600 group hover:bg-purple-600 active:bg-purple-600 active:border-purple-600">
                        <span class="text-gray-200 font-semibold ml-8 transform group-hover:translate-x-20 transition-all duration-300">Add New</span>
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
            <div class=" ">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><span class="text-xl text-purple-500 font-bold">Sr.No</span></th>
                            <th><span class="text-xl text-purple-500 font-bold">Category Name</span></th>
                            <th class="" colspan="2"><span class="text-xl text-purple-500 font-bold">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- display in table -->

                        <?php
                        include "../config.php";
                        $sql = "SELECT * FROM categories";
                        $query = mysqli_query($config, $sql);
                        $rows = mysqli_num_rows($query);
                        // $count = 0;
                        if ($rows) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>

                                <tr class="">
                                    <td class=" text-lg text-black font-semibold"><?php echo $row['cat_id'] ?></td>
                                    <td class="text-lg text-black font-semibold"><?php echo $row['cat_name'] ?></td>
                                    <td class="">
                                        <a href="">
                                            <i class="fa-solid fa-user-pen text-lg  w-12 h-12  p-2  duration-500 hover:bg-purple-500 border-2 border-purple-500 hover:text-white  text-purple-500 rounded-full"></i>
                                        </a>
                                        <a href="" class="ml-2 ">
                                            <i class="fa-solid fa-trash text-lg  w-12 h-12  p-2  duration-500 hover:bg-red-700 border-2 border-red-700 hover:text-white  text-red-700 rounded-full"></i>
                                        </a>
                                    </td>
                                </tr>


                        <?php
                            }
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

<?php include "footer.php" ?>