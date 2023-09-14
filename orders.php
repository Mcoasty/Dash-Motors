<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p> your orders :<span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

<style type="text/css">

.add-products form{
   background-color: var(--white);
   border-radius: .5rem;
   padding:2rem;
   text-align: center;
   box-shadow: var(--box-shadow);
   border:var(--border);
   max-width: 50rem;
   margin:0 auto;
}

.add-products form h3{
   font-size: 2.5rem;
   text-transform: uppercase;
   color:var(--black);
   margin-bottom: 1.5rem;
}

.add-products form .box{
   width: 100%;
   background-color: var(--light-bg);
   border-radius: .5rem;
   margin:1rem 0;
   padding:1.2rem 1.4rem;
   color:var(--black);
   font-size: 1.8rem;
   border:var(--border);
}

.show-products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 30rem);
   justify-content: center;
   gap:1.5rem;
   max-width: 1200px;
   margin:0 auto;
   align-items: flex-start;
}

.show-products{
   padding-top: 0;
}

.show-products .box-container .box{
   text-align: center;
   padding:2rem;
   border-radius: .5rem;
   border:var(--border);
   box-shadow: var(--box-shadow);
   background-color: var(--white);
}

.show-products .box-container .box img{
   height: 30rem;
}

.show-products .box-container .box .name{
   padding:1rem 0;
   font-size: 2rem;
   color:var(--black);
}

.show-products .box-container .box .price{
   padding:1rem 0;
   font-size: 2.5rem;
   color:var(--red);
}

.edit-product-form{
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

.edit-product-form form{
   width: 50rem;
   padding:2rem;
   text-align: center;
   border-radius: .5rem;
   background-color: var(--white);
}

.edit-product-form form img{
   height: 25rem;
   margin-bottom: 1rem;
}

.edit-product-form form .box{
   margin:1rem 0;
   padding:1.2rem 1.4rem;
   border:var(--border);
   border-radius: .5rem;
   background-color: var(--light-bg);
   font-size: 1.8rem;
   color:var(--black);
   width: 100%;
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
 
@keyframes fadeIn {
   0%{
      transform: translateY(1rem);
      opacity: .2s;
   }
}

</style>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>