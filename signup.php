<?php require "header.php";?>
            <main class="row">
                <div class="d-signup col-lg-6 col-md-8 col-s-10 col-xs-11">
                    <form name="signupform" method="post" action="include/signup.inc.php" onsubmit="return cross();">
                        <input type="text" name="unm" placeholder="Username" />
                        <label id="unm"></label>
                        <input type="email" name="eml" placeholder="Email Address" />
                        <label id="eml"></label>
                        <input type="password" name="pwd" placeholder="Password" />
                        <label id="pwd"></label>
                        <input type="password" name="pwdc" placeholder="Confirm Password" />
                        <label id="pwd-c"></label>
                        <button name="signup" type="submit">signup</button>
                        <label id="v-submit"></label>
                        <?php 
                        if(isset($_GET['error']) && $_GET['error'] == 'emptyfields'){
                            echo '<label>all fieldes are required please fill it again</label>';
                        }else if(isset($_GET['error']) && $_GET['error'] == 'invalidusername'){
                            echo '<label>username can\'t contain sympols</label>';
                        }
                        else if(isset($_GET['error']) && $_GET['error'] == 'invalidemail'){
                            echo '<label>you enter invalid email</label>';
                        }else if(isset($_GET['error']) && $_GET['error'] == 'weackpass'){
                            echo '<label>weak password</label>';
                        }else if(isset($_GET['error']) && $_GET['error'] == 'notmatch'){
                            echo '<label>not match</label>';
                        }else if(isset($_GET['error']) && $_GET['error'] == 'exist'){
                            echo '<label>your email or user name is already exist</label>';
                        }else if(isset($_GET['signup']) && $_GET['signup'] == 'success'){
                            echo '<label><p>signup successfuly you can log in now</p></label>';
                        }
                       ?>
                    </form>
                </div>
            </main>
<?php require "footer.php";?>