<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

if(isset($_POST['update_user'])){
   $update_user_id = $_POST['update_user_id'];
   $update_name = $_POST['update_name'];
   $update_password = $_POST['update_password'];
   $update_email = $_POST['update_email'];
   $update_user_type = $_POST['update_user_type'];
   

   mysqli_query($conn, "UPDATE `users` SET name = '$update_name', password = '$update_password', email = '$update_email', user_type = '$update_user_type' WHERE name = '$update_name'") or die('query failed');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>USERS</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
</head>
<body class="body">
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> user accounts </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
         <a href="admin_users.php?update=<?php echo $fetch_users['id']; ?>" class="option-btn">update</a>
         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
      <?php
         };
      ?>
   </div>
</section>


<section class="edit-vehicle-form">

<?php
   if(isset($_GET['update'])){
      $update_id = $_GET['update'];
      $update_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$update_id'") or die('query failed');
      if(mysqli_num_rows($update_query) > 0){
         while($fetch_update = mysqli_fetch_assoc($update_query)){
?>
<form action="" method="post" enctype="multipart/form-data">
   <input type="hidden" name="update_user_id" value="<?php echo $fetch_update['id']; ?>">
   <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter user name">
   <input type="email" name="update_email" value="<?php echo $fetch_update['email']; ?>" class="box" required placeholder="enter user email">
   <input type="text" name="update_password" value="<?php echo $fetch_update['password']; ?>" class="box" required placeholder="enter password">
   <div class="box-container">
      <select name="update_user_type" value="<?php echo $fetch_update['user_type']; ?>" class="box">
      <option value="client">client</option>
      <option value="admin">admin</option>
      </select>
   </div>
   <input type="submit" value="update" name="update_user" class="btn">
   <input type="reset" value="cancel" onclick="location.replace(document.referrer)" id="close-update" class="option-btn">
</form>
<?php
      }
   }
   }else{
      echo '<script>document.querySelector(".edit-vehicle-form").style.display = "none";</script>';
   }
?>

</section>

 <!-- JQUERY -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>