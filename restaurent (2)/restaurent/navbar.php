<section id="header">
    <a href="#"><img src="img\logo.png" class="logo" alt=""></a>

    <div>
        <ul id="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="menu.html">Menu</a></li>
            <!-- <li><a href="contact.php">Contact</a></li> -->
            <li><a href="cart.html">Cart</a></li>
            <?php
            // Check if the user is already logged in, if yes, redirect to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    ?>
<li><a href="login2.php">Login</a></li>
<li><a href="register.php">Register</a></li>

    <?php
}else{
    ?>

<li><a href="register.php">Register</a></li>
    <?php
}
?>
        </ul>
    </div>
</section>



