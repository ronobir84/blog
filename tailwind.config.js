/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {},
    },
    plugins: [],
}




// if (!empty($fileName)) {
//     if (in_array($image_ext, $allow_type)) {
//         if ($size <= 2000000) {
//                echo  $unlink = "upload/".$result['edit_image'];
//             unlink($unlink);
//             move_uploaded_file($tmp_name, $destination);
//             $sql3 = "UPDATE blog SET blog_title='$title', blog_body = '$body', edit_image = '$filename', category='$category', author_id = '$author_id' WHERE blog_id = '$blog_id'";
//             $query3 = mysqli_query($config, $sql3);


//             if ($query3) {
//                 $_SESSION['blog_sms'] = "Blog Update  Successful.";
//                 header("Location:index.php");
//             }
//             else {

//                 $_SESSION['blog_msg'] = "Failed Please try again";
//                 header("Location:index.php");
//             }
//         }
//         else {

//             $_SESSION['blog_img'] = "image size should be 2mb";
//             header("Location:index.php");
//         }
//     }
//     else {

//         $_SESSION['blog_file'] = "File type is not allow";
//         header("Location:index.php");
//     }
// }