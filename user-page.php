<?php
session_start();
if (isset($_POST["logout"]) && !isset($_SESSION["uname"])) {
    unset($_SESSION['uname']);
    session_destroy();
    header("location:login.php");
}
include "partials/user-header.php";
?>
    <div class="user-page">
        <div class="user-nav">
<!--
            <div class="small-6 columns">
                <div class="user-nav-panel-each">
                    <a href="user-about.php">About</a>
                </div>
            </div>
            
            <div class="small-6 columns">
                <div class="user-nav-panel-each">
                     <a href="user-portfolio.php">Portfolio</a>
                </div>
            </div>
            
            <div class="small-6 columns">
                <div class="user-nav-panel-each">
                 <a href="user-blog.php">Blog</a>
                </div>
            </div>
            
            <div class="small-6 columns"> 
                <div class="user-nav-panel-each">
                    <a href="#">lorem ipusum</a>
                </div>
            </div>
-->
       
            <ul class="user-page-nav">
                <li><a href="user-about.php">About</a></li>
                <li><a href="user-portfolio.php">Portfolio</a></li>
                <li><a href="user-blog.php">Blog</a></li>
            
            <form action="user-page.php" method="post">
                <input type="submit" name="logout" value="Log out" />
            </form>
            </ul>
        </div>
      
    </div>
    <?php include "partials/footer.php"; ?>