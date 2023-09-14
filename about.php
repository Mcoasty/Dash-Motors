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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   
<?php include 'header.php'; ?>
<section class="about">

   <div class="flex">
      <div class="content">
         <h3>why choose us?</h3>
         <p>We specialise in buying and selling quality cars to our customers in Europe and Africa. Our showroom located in Uxbridge offers a large selection of vehicles at very competitive prices.

Our success has been to provide quality service whilst maintaining a personal approach.  We ensure that all our Vehicles are provided with the relevant documentation, giving our customers the ease to register the car in France, Spain, Portugal, Nigeria and other destinations.  Our friendly staff are ready to serve your full customer needs in purchasing your next vehicle.

We come highly recommended through our customers praise and satisfaction who have promoted the Car showroom to their friends and families for both new and repeat business.

<p>Please feel free to contact us for a range British, French, Spanish, German, Portuguese and Belgian registered Cars.  Our Stock is updated on a regular basis on our website alternatively if there is something specific you are looking for you can contact us directly by phone or email to help find your next Vehicle.  You can browse through our stock of Vehicles in the vehicles page.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>Awesome Cars!!! i surely can send an interested buyer to this website.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Justin</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>I was hesitant at first in purchasing a car but the customer service was amazing.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Pricilla</h3>
      </div>

      <div class="box">
      <img src="images/pic-4.png" alt="">
         <p>Gosh!! Loved the cars this website truly deserves a thumbs up for its vehicles.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Swan</h3>
      </div>
   </div>

</section>

<section class="authors">

   <h1 class="title">our team</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/author-2.jpg" alt="">
         <div class="share">
            <a href="contact.php" class="fab fa-facebook-f"></a>
            <a href="contact.php" class="fab fa-twitter"></a>
            <a href="contact.php" class="fab fa-instagram"></a>
         </div>
         <h3>Isabell</h3>
      </div>
      <div class="box">
         <img src="images/author-4.jpg" alt="">
         <div class="share">
            <a href="contact.php" class="fab fa-facebook-f"></a>
            <a href="contact.php" class="fab fa-twitter"></a>
            <a href="contact.php" class="fab fa-instagram"></a>
         </div>
         <h3>Cate</h3>
      </div>

      <div class="box">
         <img src="images/author-5.jpg" alt="">
         <div class="share">
            <a href="contact.php" class="fab fa-facebook-f"></a>
            <a href="contact.php" class="fab fa-twitter"></a>
            <a href="contact.php" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>John</h3>
      </div>

   </div>

</section>



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
   padding-left: 6.8rem;
}
.reviews{
   background-color: var(--light-bg);
}

.reviews .box-container{
   max-width: 1200px;
   margin:0 auto;
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
   align-items: center;
   gap:1.5rem;
   justify-content: center;
}

.reviews .box-container .box{
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border:var(--border);
   border-radius: .5rem;
   text-align: center;
   padding:2rem;
}

.reviews .box-container .box img{
   height: 10rem;
   width: 10rem;
   border-radius: 50%;
}

.reviews .box-container .box p{
   padding:1rem 0;
   line-height: 2;
   color:var(--light-color);
   font-size: 1.5rem;
}

.reviews .box-container .box .stars{
   background-color: var(--light-bg);
   display: inline-block;
   margin:.5rem 0;
   border-radius: .5rem;
   border:var(--border);
   padding:.5rem 1.5rem;
}

.reviews .box-container .box .stars i{
   font-size: 1.7rem;
   color:var(--orange);
   margin:.2rem;
}

.reviews .box-container .box h3{
   font-size: 2rem;
   color:var(--black);
   margin-top: 1rem;
}

.authors .box-container{
   max-width: 1200px;
   margin:0 auto;
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
   align-items: center;
   gap:1.5rem;
   justify-content: center;
}

.authors .box-container .box{
   position: relative;
   text-align: center;
   border:var(--border);
   box-shadow: var(--box-shadow);
   overflow: hidden;
   border-radius: .5rem;
}

.authors .box-container .box img{
   width: 100%;
   height: 40rem;
   object-fit: cover;
}

.authors .box-container .box .share{
   position: absolute;
   top:0; left:-10rem;
}

.authors .box-container .box:hover .share{
   left: 1rem;
}

.authors .box-container .box .share a{
   height: 4.5rem;
   width: 4.5rem;
   line-height: 4.5rem;
   font-size: 2rem;
   background-color: var(--white);
   border:var(--border);
   display: block;
   margin-top: 1rem;
   color:var(--black);
}

.authors .box-container .box .share a:hover{
   background-color: var(--black);
   color:var(--white);
}

.authors .box-container .box h3{
   font-size: 2.5rem;
   color:var(--black);
   padding:1.5rem;
   background-color: var(--white);
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



<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>