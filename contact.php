<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $subject = mysqli_real_escape_string($conn, $_POST['subject']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND subject = '$subject' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, subject, message) VALUES('$user_id', '$name', '$email', '$number', '$subject', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
<?php include 'header.php'; ?>

<div class="heading">
   <h3><span>Contact</span> us</h3>
   <p> <a href="home.php">home</a>   /   contact </p>
</div>


<section class="contact" id="contact">

   <div class="row">
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3337.867930943897!2d36.82310856732778!3d-1.2879017461374336!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11747e756f41%3A0x146973898c119b47!2sKenyatta%20International%20Convention%20Centre!5e1!3m2!1sen!2ske!4v1649358406470!5m2!1sen!2ske" width="800" height="666" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      <form action="" method="post">
         <h3>let's hear from you</h3>
         <input type="text" name="name" required placeholder="enter your name" class="box">
         <input type="email" name="email" required placeholder="enter your email" class="box">
         <input type="number" name="number" required placeholder="enter your number" class="box">
         <input type="text" name="subject" required placeholder="subject" class="box">
         <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>

   </div>

</section>


<?php include 'footer.php'; ?>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>