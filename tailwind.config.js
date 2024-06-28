/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {},
    },
    plugins: [],
}



//   < pagination 

//  <?php
//    $pagination = "SELECT * FROM blog";
//    $run_query = mysqli_query($config, $pagination);
//    $total_post = mysqli_num_rows($query);
//    $limit = 3;
//    $pages = ceil($total_post / $limit);



//    ?>
//  <div class="relative top-20  text-center">
//     <div class="">
//        <?php
//          for ($i = 1; $i <= $pages; $i++) {


//             // if ($i == $page) {
//             //    echo "<button class ='w-12 h-10 border-2  shadow text-lg font-semibold  bg-gray-800 text-white duration-500 ml-2'>$i</button>";
//             // } else {
//             //    echo "<a href='index.php?page=$i '><button class ='w-12 h-10 border-2  shadow text-lg font-semibold text-black   hover:bg-gray-800 hover:text-white duration-500 ml-2'>$i</button></a>";
//             // }


//          ?>
//           <a href="index.php?page=<?php echo $i ?>">
//              <button class="w-12 h-10 border-2  shadow text-lg font-semibold text-black   hover:bg-gray-800 hover:text-white duration-500 ml-2"><?php echo $i ?></button>
//           </a>
//        <?php } ?>



//     </div>

//  </div>
//  <!-- ------------------------ -->
