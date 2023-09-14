<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MESSAGES</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <!-- BOX ICONS -->
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="body">
   
<?php include 'admin_header.php'; ?>

<section class="messages">

   <h1 class="title"> messages </h1>

   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">
      <p><i class='bx bxs-user-circle' style='color:#060606' ></i> user id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
      <p><i class='bx bxs-user'></i> name : <span><?php echo $fetch_message['name']; ?></span> </p>
      <p><i class='bx bxs-contact' style='color:#060606' ></i> number : <span><?php echo $fetch_message['number']; ?></span> </p>
      <p><i class='bx bxs-envelope' style='color:#060606' ></i> email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <p><i class='bx bxs-message-rounded-check' ></i> subject : <span><?php echo $fetch_message['subject']; ?></span> </p>
      <p><i class='bx bxs-chat' style='color:#060606' ></i> message : <span><?php echo $fetch_message['message']; ?></span> </p>
      <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">you have no messages!</p>';
   }
   ?>
   </div>

</section>
<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>