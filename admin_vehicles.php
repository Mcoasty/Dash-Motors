<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}; 


if(isset($_POST['add_vehicle'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_vehicle_name = mysqli_query($conn, "SELECT name FROM `vehicles` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_vehicle_name) > 0){
      $message[] = 'vehicle name already added';
   }else{
      $add_vehicle_query = mysqli_query($conn, "INSERT INTO `vehicles`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');

      if($add_vehicle_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'vehicle added successfully!';
         }
      }else{
         $message[] = 'vehicle could not be added!';
      }
   }
}


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `vehicles` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `vehicles` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_vehicles.php');
}

if(isset($_POST['update_vehicle'])){

   $update_v_id = $_POST['update_v_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `vehicles` SET name = '$update_name', price = '$update_price' WHERE id = '$update_v_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `vehicles` SET image = '$update_image' WHERE id = '$update_v_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }
   header('location:admin_vehicles.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>vehicles</title>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
</head>
<body class="body">
   
<?php include 'admin_header.php'; ?>

<!-- vehicle CRUD section starts  -->
<section class="add-vehicles">

   <h1 class="title">vehicles</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add vehicle</h3>
      <input type="text" name="name" class="box" placeholder="enter vehicle name" required>
      <input type="number" min="0" name="price" class="box" placeholder="enter vehicle price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add vehicle" name="add_vehicle" class="btn">
   </form>

</section>

<!-- vehicle CRUD section ends -->

<!-- show vehicles  -->

<section class="show-vehicles">

   <div class="box-container">

      <?php
         $select_vehicles = mysqli_query($conn, "SELECT * FROM `vehicles`") or die('query failed');
         if(mysqli_num_rows($select_vehicles) > 0){
            while($fetch_vehicles = mysqli_fetch_assoc($select_vehicles)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_vehicles['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_vehicles['name']; ?></div>
         <div class="price">$<?php echo $fetch_vehicles['price']; ?>/-</div>
         <a href="admin_vehicles.php?update=<?php echo $fetch_vehicles['id']; ?>" class="option-btn">update</a>
         <a href="admin_vehicles.php?delete=<?php echo $fetch_vehicles['id']; ?>" class="delete-btn" onclick="return confirm('delete this vehicle?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no vehicles added yet!</p>';
      }
      ?>
   </div>

</section>


<section class="edit-vehicle-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `vehicles` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_v_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image'] ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter vehicle name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter vehicle price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_vehicle" class="btn">
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


<style type="text/css">
/*VEHICLES*/
.section .add-vehicles, .section .show-vehicles, .section .edit-vehicle-form{
   padding:1.5rem 2rem;

}
.add-vehicles form{
   background-color: #c40f12;
   border-radius: 20px;
   padding:1.5rem;
   text-align: center;
   box-shadow: var(--box-shadow);
   border:var(--border);
   max-width: 40rem;
   margin:0 auto;
}

.add-vehicles form h3{
   font-size: 2.4rem;
   text-transform: uppercase;
   color:var(--black);
   margin-bottom: 1.5rem;
}

.add-vehicles form .box{
   width: 100%;
   background-color: whitesmoke;
   border-radius: 20px;
   margin:1rem 0;
   padding:1.2rem 1.4rem;
   color:var(--black);
   font-size: 1.8rem;
   border:var(--border);
}

.show-vehicles .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 42.5rem);
   justify-content: center;
   gap:1.5rem;
   max-width: 1900px;
   margin:0 auto;
   align-items: flex-start;
}

.show-vehicles{
   padding-top: 0;
}

.show-vehicles .box-container .box{
   text-align: center;
   padding:1rem;
   border-radius: 20px;
   border:var(--border);
   box-shadow: var(--box-shadow);
   background-color: transparent;      
}

.show-vehicles .box-container .box img{
   height: 27rem;
   width: 40rem;
   padding-bottom: 0;
   padding-top: 0;
   border-radius: 20px;
}
.show-vehicles .box-container .box img:hover{
   transform: scale(.9);
}

.show-vehicles .box-container .box .name{
   padding:1rem 0;
   font-size: 2.4rem;
   font-weight: 500;
   color: var(--black);
   background-color: #ccc;
   border-radius: 15px;
   text-decoration: underline;
}

.show-vehicles .box-container .box .descrip{
   padding:1rem 0;
   font-size: 0.5rem;
   color:var(--black);
   background-color: #ccc;
   border-radius: 15px;
}

.show-vehicles .box-container .box .price{
   padding:1rem 0;
   font-size: 2.5rem;
   font-weight: bold;
   color: red;
   background-color: var(--white);
   border-radius: 15px;
}

.edit-vehicle-form{
   min-height: 100vh;
   background-color: rgba(0,0,0,.7);
   display: flex;
   align-items: center;
   justify-content: center;
   padding:2rem;
   overflow-y: scroll;
   position: fixed;
   top:0; left:0; 
   z-index: 1200;
   width: 100%;
}

.edit-vehicle-form form{
   width: 50rem;
   padding:1.5rem;
   text-align: center;
   border-radius: 15px;
   background-color: var(--black);
}

.edit-vehicle-form form img{
   height: 25rem;
   width: 47rem;
   margin-bottom: 0;
   border-radius: 15px;
}

.edit-vehicle-form form .box{
   margin:1rem 0;
   padding:1.2rem 1.4rem;
   border:var(--border);
   border-radius: 15px;
   background-color: var(--light-bg);
   font-size: 1.7rem;
   font-weight: 500;
   color: var(--black);
   width: 90%;
}
/*VEHICLES END*/
</style>



</html>