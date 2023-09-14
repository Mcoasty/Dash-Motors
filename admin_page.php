<?php
include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      ADMIN PANEL
   </title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">   
   <!-- BOX ICONS -->
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/admin_styles.css">
</head>
<body class="body">
   
<?php include 'admin_header.php'; ?>

<!-- admin dashboard section starts  -->
<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_Price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_Price = $fetch_pendings['total_Price'];
                  $total_pendings += $total_Price;
               };
            };
         ?>
         <h3>$<?php echo $total_pendings; ?>/-</h3>
         <p>Total pendings</p>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>$<?php echo $total_completed; ?>/-</h3>
         <p>Completed payments</p>
      </div>

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>Order placed</p>
      </div>

      <div class="box">
         <?php 
            $select_vehicles = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_vehicles = mysqli_num_rows($select_vehicles);
         ?>
         <h3><?php echo $number_of_vehicles; ?></h3>
         <p>Vehicles added</p>
      </div>

      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'client'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>Clients</p>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p>Admins</p>
      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>Total accounts</p>
      </div>

      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>New messages</p>
      </div>
</div>

</section>
<!-- admin dashboard section ends -->
</body>
</html>

<style type="text/css">


/*DASHBOARD*/
.title{
   text-align: center;
   margin-bottom: 2rem;
   text-transform: uppercase;
   color:var(--black);
   font-size: 4rem;
}
.dashboard .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
   gap: 11rem;
   max-width: 1150px;
   margin:4rem 4rem;
   justify-content: center;
}
.dashboard .box-container .box{
   border-radius: 20px;
   padding: 1rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   text-align: center;
   width: 30rem;
   background-color: transparent;
}

.dashboard .box-container .box h3{
   font-size: 2.5rem;
   color: black;
   font-weight: bolder;
   background-color: whitesmoke;
}
.dashboard .box-container .box p{
   margin-top: 1rem;
   padding:1rem;
   background-color: #f4fffa;  
   color:var(--purple);
   font-size: 2.2rem;
   font-weight: 500;
   border-radius: 20px;
   border:var(--border);
}
/*DASHBOARD END*/

</style>