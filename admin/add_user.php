<?php include "header.php" ?>


<?php

if (isset($_POST['add_user'])) {
    $username = mysqli_real_escape_string($config, $_POST['username']);
    $email = mysqli_real_escape_string($config, $_POST['email']);
    $password = mysqli_real_escape_string($config, sha1($_POST['password']));
    $c_pass = mysqli_real_escape_string($config, sha1($_POST['c_pass']));
    $role = mysqli_real_escape_string($config, $_POST['role']);
    
    if (strlen($username) < 4 || strlen($username) > 100) {
        $error = "Username Must Be 4 Character";
        // $_SESSION['user_error'] = $error;
    }
    
    elseif (strlen($password) < 4 ) {
        $error = "Password Must Be 4 Character";
        // $_SESSION['user_error'] = $error;
    } 
    
    elseif ($password != $c_pass) {
        $error = "Password Does Not Match";
        // $_SESSION['user_error'] = $error;
    }
    else {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $query = mysqli_query($config, $sql);
        $row = mysqli_num_rows($query);
        if ($row >= 1) {
            $error = "Email Already Exist";
            // $_SESSION['user_error'] = $error;
        }
        else {
            echo "User Added Successful";
        }
    }
}



?>


<div class="w-[850px] h-[750px]  bg-gray-500 mx-auto">
    <?php
    // if(isset( $_SESSION['user_error'])){
    //     $user_error = $_SESSION['user_error'];
    //     echo "<span class='text-xl font-semibold text-red-700 absolute  right-[35%] mt-4'>$user_error</span>";
    //     unset($_SESSION['user_error']);
    // } 
    if ( !empty($error)) {
        echo "<span class='text-xl font-semibold text-red-700 absolute  right-[35%] mt-4'>$error</span>";
    }


    ?>

    <a class="duration-500" href="users.php">
        <button class="cursor-pointer duration-200 hover:scale-75 active:scale-75 absolute ml-24 mt-3 title=" Go Back">
            <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="60px" viewBox="0 0 24 24" class="stroke-purple-500">
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
            </svg>
        </button>
    </a>


    <div class="w-[620px] h-[550px]  mx-auto relative top-28 overflow-hidden  bg-white p-12 mt-12  rounded-lg shadow-md  ">

        <h2 class="text-2xl text-center text-purple-500 font-bold mb-2">Register</h2>

        <form method="post" action="">
            <div class="pt-2">
                <div class="pt-3">
                    <!-- <label class="block text-lg font-semibold  text-purple-500 " for="name">User Name</label> -->
                    <input name="username" placeholder="username" class="  text-black border-2 border-gray-300  rounded-md  py-2.5 w-full     focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="text" required value="<?php (!empty($error))?  $username : '' ;?> " >

                </div>
                <div class=" pt-3">
                    <!-- <label class="block text-lg font-semibold  text-purple-500 " for="name">Email</label> -->
                    <input name="email" placeholder="Email" class="  text-black border-2 border-gray-300 rounded-md   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="email" required value="<?php (!empty($error))?  $email : '' ;?> ">

                </div>
                <div class=" pt-3">
                    <!-- <label class="block text-lg font-semibold  text-purple-500 " for="name">Password</label> -->
                    <input name="password" placeholder="Password" class=" rounded-md  text-black border-2 border-gray-300   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="password" required>

                </div>
                <div class=" pt-3">
                    <div>
                        <!-- <label class="block text-lg font-semibold  text-purple-500 " for="name"> Confirm Password</label> -->
                        <input name="c_pass" placeholder="Confirm Password" class=" rounded-md  text-black border-2 border-gray-300   py-2.5 w-full  focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="password" required>

                    </div>
                    <div class="relative top-3">
                        <!-- <label class="block text-lg font-semibold  text-purple-500 " for="name"> Select Role</label> -->
                        <select name="role" required class=" border-2 border-gray-300 placeholder:text-gray-600  text-gray-600    py-2.5 w-full  px-3  " id="">
                            <option value="">Select Role</option>
                            <option value="1">Admin</option>
                            <option value="0">CO-Admin</option>




                        </select>

                    </div>

                </div>



                <div class="flex justify-end relative top-8">
                    <button value="create" type="submit" name="add_user" class="relative text-xl hover:text-black text-white w-full  font-semibold px-8 py-2 rounded-md bg-purple-500 hover:border-purple-900 border-purple-500 isolation-auto z-10 border-2  before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-purple-900 before:-z-10 before:aspect-square before:hover:scale-150 overflow-hidden before:hover:duration-700">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>







<?php include "footer.php" ?>