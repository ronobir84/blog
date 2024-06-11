 
 <?php session_start()?>
 
 <h3>Welcome</h3>

 <?php
    if (isset($_SESSION['user_data'])) {
     echo $_SESSION['user_data']['1'];
         
    }




    ?>