<?php require "header.php";?>
            <main class="row">
            <?php
            if(!isset($_SESSION['id']) && !isset($_SESSION['username'])){
                echo '
            <div class="d-login col-lg-5 col-md-7 col-s-10 col-xs-11 ">
                    <form name="loginform" action="include/login.inc.php" method="post">
                        <input name="uemail" type="email" placeholder="Email Address" required/>
                        <input name="upwd" type="password" placeholder="Password" required/>
                        <button name="login" type="submit">login</button>
                    </form>
                    ';
            if(isset($_GET['error'])&&$_GET['error'] == 'emailnotfound'){
            echo'<span>wrong email</span>';
            }else if(isset($_GET['error']) && $_GET['error'] == 'wrongpass'){
            echo' <span>wrong password<br> <p>forget your password! <a href="emlmsg.php">click here</a></p></span>';
            }
            
                echo' <p class="h-signup">if you a new user tou can <a href="signup.php">signup</a> now</p>';
            
            echo '</div>';
}
                else if(isset($_SESSION['id']) && isset($_SESSION['username'])){
                echo '
                <div class="d-success col-lg-12 col-md-12 col-s-12 col-xs-12">
                    <p>you are logged in</p>
                </div>'; 
            }
                ?>
            </main>
<?php require "footer.php";?>