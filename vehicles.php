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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      Vehicles
   </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<section class="products">

   <h1 class="title">latest vehicles</h1>

   <div class="box-container">

      <?php  
         $select_vehicles = mysqli_query($conn, "SELECT * FROM `vehicles`") or die('query failed');
         if(mysqli_num_rows($select_vehicles) > 0){
            while($fetch_vehicles = mysqli_fetch_assoc($select_vehicles)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_vehicles['image']; ?>" alt="">
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

</section>




<style type="text/css">
html{
   font-size: 62.5%;
   overflow-x: hidden;
   scroll-padding-top: 7rem;
   scroll-behavior: smooth;
}
.heading{
   min-height: 80vh;
   display: flex;
   flex-flow: column;
   align-items: center;
   justify-content: center;
   gap:1rem;
   background: url(../images/2022.png) no-repeat;
   background-size: cover;
   background-position: center;
   text-align: center;
}
.heading h3{
   font-size: 5rem;
   color: rgb(134, 21, 21);
   text-transform: uppercase;
}
.heading h3 span{
   font-size: 5rem;
   color: rgb(253, 250, 63);
   text-transform: uppercase;
}
 
.heading p{
   font-size: 2.5rem;
   color: rgb(173, 9, 9);
   font-weight: bolder;
}
 
.heading p a{
   font-size: 3rem;
   color: white;
   font-weight: bolder;
}
 
.heading p a:hover{
   text-decoration: underline;
   text-transform: uppercase;
}
.products .box-container .box .image:hover{
   transform: scale(.9);
}
.products {
   padding-left: 0rem;
}
.products .box-container{
   padding-left: 0rem;
}


/*--VEHICLES PAGE--*/
.products .box-container{
   max-width: 2000px;
   margin:0 auto;
   display: grid;
   grid-template-columns: repeat(auto-fit, 42.5rem);
   align-items: flex-start;
   gap: 0.5rem;
   justify-content: center;
   background-color: transparent;
   width: 1370px;
   margin-left: 0;
}

.products .box-container .box{
   padding: 0.7rem;
   border-radius: 15px;
   background-color: transparent; 
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
   text-align: center;
   border:  .1rem solid #333;
   position: relative;
   width: 42rem;
   height: 38rem;
   margin-bottom: 1rem;
}

.products .box-container .box .image{
   height: 28.5rem;
   width: 40rem;
   padding-bottom: 0;
   padding-top: 0;
   border-radius: 15px;
}

.products .box-container .box .name{
   padding:0rem 0;
   font-size: 2rem;
   font-weight: bolder;
   color: black;
   background-color: #ccc;
   border-radius: 15px;
   text-decoration: underline;
}

.products .box-container .box .qty{
   width: 25%;
   padding:0.7rem 1rem;
   border-radius: 0.5rem;
   border: .1rem solid #333;
   margin:1rem 0;
   font-size: 2rem;
}

.products .box-container .box .price{
   position: absolute;
   top:1rem; left:0;
   border-radius: .5rem;
   padding:0.5rem;
   font-size: 2.5rem;
   color:var(--white);
   background-color: var(--red);
}
 
@keyframes fadeIn {
   0%{
      transform: translateY(1rem);
      opacity: .2s;
   }
}
</style>




<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>