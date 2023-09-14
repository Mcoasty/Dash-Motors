<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- BOX ICONS -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<!-- custom css file link  -->
<link rel="stylesheet" href="css/admin_style.css">

<header class="header">

   <div class="flex">
   
      <a href="admin_page.php" class="logo"><i class='bx bxs-analyse bx-tada bx-rotate-180' ></i> ADMIN <span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_vehicles.php">vehicles</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
         <a href="admin_contacts.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

</div>

<style type="text/css">
body{
   background-image:url('./images/Race.jpg');
   background-size: cover;
   background-repeat: no-repeat;
   margin: auto;
   min-height: 100vh;
}
.btn,
.option-btn,
.delete-btn,
.white-btn{
   display: inline-block;
   margin-top: 1rem;
   padding:1rem 3rem;
   cursor: pointer;
   color:var(--white);
   font-size: 1.8rem;
   border-radius: 20px;
   text-transform: none;
}

.btn:hover,
.option-btn:hover,
.delete-btn:hover{
   background-color: #168c01;
   text-transform: capitalize;
}

/*HEADER*/
.header{
   position: sticky;
   top:0; left:0; right:0;
   z-index: 1000;
   box-shadow: 0.5rem 1rem rgba(0,0,0,.1);
   background-color: #c41411;
}

.header .flex{
   display: flex;
   align-items: center;
   padding:1rem;
   justify-content: space-between;
   position: relative;
   max-width: 1200px;
   margin:0 auto;
}
 
.header .flex .logo{
   font-size: 2.5rem;
   font-weight: 600;
   color: whitesmoke;
   text-decoration: none;
}

.header .flex .logo span{
   color: #168c01;
}

.header .flex .navbar a{
   margin:0 2.5rem;
   font-size: 2.5rem;
   font-weight: 500;
   color: black;
   text-decoration: none;
}

.header .flex .navbar a:hover{
   color: #001289;
   text-transform: uppercase;
}

.header .flex .icons div{
   margin-left: 1.5rem;
   font-size: 2.5rem;
   cursor: pointer;
   color: #333;
}

.header .flex .icons div:hover{
   color: yellow;
}

.header .flex .account-box{
   position: absolute;
   top:120%; right:2rem;
   width: 35rem;
   box-shadow: 0.5rem 1rem rgba(0,0,0,.1);
   border-radius: 20px;
   padding:2rem;
   text-align: center;
   border: 0.1rem solid black;
   display: none;
   animation:fadeIn .2s linear;
}

.header .flex .account-box.active{
   display: inline-block;
   border-radius: 20px;
   background-color: var(--black);
}

.header .flex .account-box p{
   font-size: 2rem;
   font-weight: 700;
   color: #c41411;
   margin-bottom: 1.5rem;
   background-color: transparent;
}

.header .flex .account-box p span{
   color: rgb(201, 4, 201);
   font-weight: 700;
}

.header .flex .account-box .delete-btn{
   margin-top: 0;
   font-weight: 700;
}

.header .flex .account-box div{
   margin-top: 1.5rem;
   font-size: 2rem;
   color: #666;
   font-weight: 700;
}

.header .flex .account-box div a{
   color: orange;
   font-weight: 700;
}

.header .flex .account-box div a:hover{
   text-decoration: underline;
}

#menu-btn{
   display: none;
}

/*VEHICLES*/
</style>

<script>
let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   accountBox.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   accountBox.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   accountBox.classList.remove('active');
}
</script>

</header>