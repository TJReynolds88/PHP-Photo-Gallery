<header class="head">

    <h1> My Photo Gallery </h1>
    <ul>
         <li><a href="../index.php" alt="Home">Home</a></li>
         <?php
            session_start();
            if(isset($_SESSION['loggedIn']) && $_SESSION["loggedIn"] == true) {
                echo '<li><a href="./admin/admin.php" alt="Admin">Admin</a></li>';
            } else {
                echo '<li><a href="./admin/login.php" alt="Admin Login">Admin LogIn</a></li>';            
            }
        ?>
         

    </ul>
</header>
