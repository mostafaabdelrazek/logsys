<?php require "header.php";?>
    <main>
        <div class="d-res col-lg-5 col-md-7 col-s-10 col-xs-11">
                <form name="fres" method="$_POST" action="include/res.inc.php">
                    <input name="rescode" type="text" placeholder="verfication code" required/>
                    <button name="res" type="submit">validate</button>
                </form>
        </div>
    </main>
<?php require "footer.php";?>