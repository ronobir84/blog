<?php session_start();
// ob_start();

if (isset($_SESSION['user_data'])) {
    echo "<script>window.location.href='http://localhost/Blog/admin/index.php'</script>";
    // header("location:http://localhost/Blog/admin/index.php");
}
?>


<?php include "./partials/header.php"; ?>

<?php
include "config.php";





if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($config, $_POST['email']);
    $password = mysqli_real_escape_string($config, $_POST['password']);
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $query = mysqli_query($config, $sql);
    $date = mysqli_num_rows($query);
    if ($date) {
        $result = mysqli_fetch_assoc($query);
        $user_date = array($result['user_id'], $result['username'], $result['role']);
        $_SESSION['user_data'] = $user_date;
        echo "<script>window.location.href='./admin/index.php'</script>";
    } else {

        $_SESSION['error'] = 'Invalid Email/Password!!';
        "<script>window.location.href='Login.php'</script>";
        // header("location:Login.php");
    }
}


?>


<div class="relative top-24">
    <div class="w-[40%] bg-gray-500  h-[650px]    mx-auto top-20">

        <div class="relative top-20">
            <div class="">
                <div class="w-[500px] h-[500px] bg-gray-800 mx-auto    px-10 pt-10 shadow">


                    <?php
                    if (isset($_SESSION['error'])) {
                        $error = $_SESSION['error'];
                        echo "<p class='text-xl text-red-700 font-semibold relative  text-center'>" . $error . "</p>";
                        unset($_SESSION['error']);
                    }




                    ?>

                    <h2 class="text-3xl relative top-10 font-bold  mb-10 text-center from-purple-400 via-pink-400 to-blue-400 bg-gradient-to-r bg-clip-text text-transparent uppercase">Login</h2>

                    <form method="POST" action="" class="flex flex-col pt-16">
                        <input name="email" placeholder="Email Address" class="bg-gray-700 text-gray-200 border-0 rounded-md p-4 mb-7 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="email" required>
                        <input name="password" placeholder="Password" class="bg-gray-700 text-gray-200 border-0 rounded-md p-4 mb-7 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-purple-400 transition ease-in-out duration-150" type="password" required>


                        <button type="submit" name="login" class="relative text-xl text-black hover:text-white font-semibold px-8 py-2 rounded-md bg-purple-400 hover:border-purple-900 border-purple-400 isolation-auto z-10 border-2  before:absolute before:w-full before:transition-all before:duration-700 before:hover:w-full before:-left-full before:hover:left-0 before:rounded-full before:bg-purple-900 before:-z-10 before:aspect-square before:hover:scale-150 overflow-hidden before:hover:duration-700">
                            Login
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="relative top-28">
    <?php include "./partials/footer.php"; ?>
</div>