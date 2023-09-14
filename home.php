<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'vehicle added to cart!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
     
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <title>
      Home
   </title>
</head>
<body class="body">
<?php include 'header.php'; ?>
<section class="group">
   <section class="slide">
    <div class="slider">
        <span style="--i:1;"><img src="images/lotus.jpg" alt=""></span>
        <span style="--i:2;"><img src="images/7.jpg" alt=""></span>
        <span style="--i:3;"><img src="images/toyo.jpg" alt=""></span>
        <span style="--i:4;"><img src="images/1.jpg" alt=""></span>
        <span style="--i:5;"><img src="images/2.jpg" alt=""></span>
        <span style="--i:6;"><img src="images/3.jpg" alt=""></span>
        <span style="--i:7;"><img src="images/4.jpg" alt=""></span>
        <span style="--i:8;"><img src="images/6.jpg" alt=""></span>
        <span style="--i:9;"><img src="images/6.jpg" alt=""></span>
    </div>
   </section>


<!---- Vehicles Section
============================-->
<section class="vehicles">

   <h1 class="title">latest cars</h1>

   <div class="box-container">

      <?php  
         $select_vehicles = mysqli_query($conn, "SELECT * FROM `vehicles` LIMIT 12") or die('query failed');
         if(mysqli_num_rows($select_vehicles) > 0){
            while($fetch_vehicles = mysqli_fetch_assoc($select_vehicles)){
      ?>
     <form action="" method="post" class="box">
      <a href="#"><img class="image" src="uploaded_img/<?php echo $fetch_vehicles['image']; ?>" alt=""></a>
      <div class="name"><?php echo $fetch_vehicles['name']; ?></div>
      <div class="price">$<?php echo $fetch_vehicles['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_vehicles['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_vehicles['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_vehicles['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no vehicles added yet!</p>';
      }
      ?>
   </div>
   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="vehicles.php" class="option-btn">load more</a>
   </div>
 </section>
</section>
<div class="fireworks-container" style="background-image: url(./assets/sai-gon-by-night-3914364_1280.jpg);"></div>

<?php include 'footer.php'; ?>
</body>

<style type="text/css">

:root{
   --purple:#8e44ad;
   --red:#c0392b;
   --orange:#f39c12;
   --black:#333;
   --white:#fff;
   --light-color:#666;
   --light-white:#ccc;
   --light-bg:#f5f5f5;
   --border:.1rem solid var(--black);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
}
*::selection{
   background-color: var(--purple);
   color:var(--white);
}

*::-webkit-scrollbar{
   height: .5rem;
   width: 1rem;
}

*::-webkit-scrollbar-track{
   background-color: transparent;
}

*::-webkit-scrollbar-thumb{
   background-color: var(--purple);
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
   scroll-padding-top: 7rem;
   scroll-behavior: smooth;
}

.group{
   padding-left: 1rem;
}
.vehicles .title{
   text-align: center;
   margin-bottom: 1rem;
   padding-top: 0;
   padding-bottom: 0.5rem;
   text-transform: uppercase;
   color: black;
   font-size: 3.5rem;
   text-decoration: underline;
}

.about .btn,
.vehicles .btn,
.vehicles .option-btn,
.about .white-btn{
   display: inline-block;
   margin-top: 1rem;
   padding:1rem 3rem;
   cursor: pointer;
   color:var(--white);
   font-size: 1.8rem;
   border-radius: 0.5rem;
   text-transform: capitalize;
}
.about .btn:hover,
.vehicles .btn:hover{
   background-color: black;
}
.vehicles .option-btn:hover{
   background-color: var(--black);
   text-transform: uppercase;
}
.about .white-btn,
.vehicles .btn,
.about .btn{
   background-color: var(--purple);
}
.vehicles .option-btn{
   background-color: var(--orange);
   text-decoration: none;
}
.about .white-btn:hover{
   background-color: var(--white);
   color:var(--black);
}


.vehicles{
   padding:0;
   margin: 0;
}

.vehicles .box-container{
   max-width: 2000px;
   margin:1rem auto;
   display: grid;
   grid-template-columns: repeat(auto-fit, 42.5rem);
   align-items: flex-start;
   gap: 1.5rem;
   justify-content: center;
   background-color: transparent;
   width: 1340px;
}
.vehicles .box-container .box{
   padding: 0.7rem;
   border-radius: 15px;
   background-color: transparent; 
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
   text-align: center;
   border:  .1rem solid #333;
   position: relative;
   width: 43rem;
   height: 38rem;
   padding-bottom: 0.7rem;
}
.box-container .box .image{
   height: 28.5rem;
   width: 41rem;
   padding-bottom: 0;
   padding-top: 0;
   border-radius: 15px;
}
.box-container .box .image:hover{
   transform: scale(.9);
}
.vehicles .box-container .box .name{
   padding:0rem 0;
   font-size: 2rem;
   font-weight: bolder;
   color: black;
   background-color: #ccc;
   border-radius: 5px;
   text-decoration: underline;
}
.vehicles .box-container .box .qty{
   width: 25%;
   padding:0.7rem 1rem;
   border-radius: 0.5rem;
   border: .1rem solid #333;
   margin:1rem 0;
   font-size: 2rem;
}
.vehicles .box-container .box .price{
   position: absolute;
   top:1rem; left:0;
   border-radius: .5rem;
   padding:0.5rem;
   font-size: 2.5rem;
   color: white;
   background-color: #c0392b;
}

.slide{
    max-width: 1200px;
    margin: 5rem auto;
    margin-top: 12rem;
    margin-bottom: 12rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, 41.5rem);
    align-items: flex-start;
    gap:1.5rem;
    align-items: center;
    justify-content: center;
    background-color: black;
}
.slider{
    position: relative;
    width: 340px;
    height: 230px;
    transform-style: preserve-3d;
    animation: rotate 120s linear infinite;
    padding-top: 10rem;
    margin-left: 4rem;
}
@keyframes rotate{
    0% {
        transform: perspective(1000px) rotateY(0deg);
    }
    100% {
        transform: perspective(1000px) rotateY(360deg);
    }
}
.slider span{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transform-origin: center;
    transform-style: preserve-3d;
    transform: rotateY(calc(var(--i)*45deg)) translateZ(450px);

}
.slider span img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 15px;
    object-fit: auto;
    transition: 2s;
    max-width: 3500px;
}
.slider span:hover img{
    transform: translateY(-40px) scale(1.0);
}

</style>
<script src="js/script.js"></script>
<script src="./js/fireworks.js"></script>
<script src="./js/app.js"></script>
</html>