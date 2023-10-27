<link rel="stylesheet" href="./changepassword/styleforchange.css?v=<?php echo time()?>">
<div class="changepassword">
<script src="./changepassword/scriptforchange.js?v=<?php echo time()?>"></script>
    <div class="change-container">
        <form onsubmit="return validation();" action="./changepassword/change.php" method="post">
        <div class="passchange">
        <label for="cur-password">Current Password : </label>
            <input type="password" id="cur-password" placeholder="Password" name="cur-password" required>
            <input onclick="typechange('cur-password')" type="checkbox" name="" id="">
        </div>
        <label id="cur-passwordinvalid" style="color: red;visibility: hidden;">Not same</label>
        <div class="passchange">
            <label for="new-password">New Password&ensp;&ensp;&ensp; : </label>
            <input type="password" id="new-password" placeholder="Password" name="new-password" required>
            <input onclick="typechange('new-password')" type="checkbox" name="" id="">
        </div>
        <label id="new-passwordinvalid" style="color: red;visibility: hidden;">Not same</label>
        <div class="passchange">
            <label for="con-password">Confirm Password : </label>
            <input type="password" id="con-password" placeholder="Password" name="password" required>
            <input onclick="typechange('con-password')" type="checkbox" name="" id="">
        </div>
        <label id="con-passwordinvalid" style="color: red;visibility: hidden;">Not same</label>
        <div class="passchange">
            <label id="same-password" style="color: red; width:auto;visibility: hidden;">Two password should be same</label>
        </div>
        <div class="passchange">
            <div></div>
            <input type="submit" value="Change" class="submit-button">
            <div></div>
        </div>
        <div class="change_footer">
        <?php
            if (isset($_GET["wrongpassword"]) && $_GET["wrongpassword"] === "true") {
                echo '<div id="wrongpassword" style="color:red;">Wrong Password Please try again....</div>';
            }
            if (isset($_GET["passwordchanged"]) && $_GET["passwordchanged"] === "true") {
                echo '<div id="passwordchanged" style="color: #00ff7b;">Passsword changed successfully.</div>';
            }
            ?>
        </div>
        </form>

    </div>


</div>
