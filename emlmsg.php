<?php require "header.php";?>
    <main>
        <div class="d-res col-lg-5 col-md-7 col-s-10 col-xs-11">
            <form name="femlmsg" method="post" action="include/emlmsg.inc.php">
                <input name="reml" type="email" placeholder="Enter Email Address" required/>
                <button name="emlmsg" type="submit">reset now</button>
            </form>
           
        </div>
    </main>
<?php require "footer.php";?>