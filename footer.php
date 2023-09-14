<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php">home</a>
         <a href="about.php">about</a>
         <a href="vehicles.php">vehicles</a>
         <a href="contact.php">contact</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="search_page.php">Search</a>
         <a href="login.php">login</a>
         <a href="cart.php">cart</a>
         <a href="orders.php">orders</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <p> <i class="fas fa-phone"></i> +2547-9845-6488</p>
         <p> <i class="fas fa-phone"></i> +2547-2424-3335 </p>
         <p> <i class="fas fa-envelope"></i> liog319@gmail.com </p>
         <p> <i class="fas fa-map-marker-alt"></i> Nairobi, Kenya - 00100 </p>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </div>

   <p class="credit"> &copy; copyright  @ <?php echo date('Y'); ?> by <span>Mr. ROBERT</span> </p>
   <hr>
   <p class="top">
   <a href="#"> <i class="fas fa-arrow-alt-circle-up"></i> Back to top </a>
   </p>

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

 

.footer{
   background-color: var(--light-bg);
}

.footer .box-container{
   max-width: 1200px;
   margin:0 auto;
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
   gap:3rem;
}

.footer .box-container .box h3{
   text-transform: uppercase;
   color:var(--black);
   font-size: 2rem;
   padding-bottom: 2rem;
}

.footer .box-container .box p,
.footer .box-container .box a{
   display: block;
   font-size: 1.7rem;
   color:var(--light-color);
   padding:1rem 0;
}

.footer .box-container .box p i,
.footer .box-container .box a i{
   color:var(--purple);
   padding-right: .5rem;
}

.footer .box-container .box a:hover{
   color:var(--purple);
   text-decoration: underline;
}

.footer .credit{
   text-align: center;
   font-size: 2rem;
   color:var(--light-color);
   border-top: var(--border);
   padding-top: 1rem;
   margin-top: 2rem;
}

.footer .credit span{
   color: blue;
   font-weight: bold;
}

.footer .top{
   font-size: 1.7rem;
   color:var(--light-color);
   
} 

</style>