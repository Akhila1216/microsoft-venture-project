<?php

function DisplayLoginForm(){

    ?>
    <h3 class="greyBG">Login</h3>
    <form method="post" action="">
        <label for="username">Username</label>
        <input type="email" name="username" id="username" value="" required />
        <div class="clr"></div>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" value="" required />
        <div class="clr"></div>
        <input type="submit" name="submitted" class="greenBG" value="Login">
        <div class="clr"></div>
    </form>
    <?php
}

function DisplayContactForm($record){

    ?>

    <h3 class="greyBG"><?php echo($record["id"]>0)?$record["fname"]." ".$record["lname"]:"New contact setup";?></h3>
    <form action="" method="post" name="contactForm">
        <label for="catid">Category</label>
        <select name="catid" id="catid">
            <option>Select a category</option>
            <?php
            $cats = getCategories();
            while($cat = mysqli_fetch_assoc($cats)){
                echo "<option value='".$cat['id']."'";
                echo ($record['catid'] == $cat['id'])?"selected" : "";
                echo ">".$cat['catname']."</option>";
            }
            ?>
            </select>
            <label for="fname">First Name</label>
            <input type="text" name="fname" value="<?php echo $record['fname']?>" id="fname" required />

            <label for="lname">Last Name</label>
            <input type="text" name="lname" value="<?php echo $record['lname']?>" id="lname" required />

            <label for="phone">Phone</label>
            <input type="number" minlength="10" maxlength="10" name="phone" value="<?php echo $record['phone']?>" id="phone" required />

            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $record['email']?>" id="email" required />

            <a href="lists.php"  class="cancel">Cancel</a>
            <input type="submit" name="submitted" value="Save" />

            <div class="clr"></div>
            <input type="hidden" name = "id" value="<?php echo ($record["id"])? $record['id']:"0";?>"  />
    </form>
    <?php

}

function DisplayCategoryForm($record){

    ?>

    <h3 class="greyBG">Category</h3>
    <form action="" method="post" name="categoryForm">
        <label for="catname">Category name</label>
        <input type="text" name="catname" id="catname" value="<?php echo $record['catname'];?>" required />
        <a href="lists.php" class="cancel"> Cancel </a>
        <input type ="submit" name="submitted" value="Save" />
        <div class="clr "></div>
        <input type="hidden" name="id" value="<?php echo $record['id'];?>" />
    </form>
    <?php

}

?>