<form class=<?php echo empty($_SESSION['auth_attempted']) ? "needs-validation" : "was-validated"; ?> method="post"
    action="<?= "$page" ?>" novalidate>
    <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group">
            <input name="username" type="text" class="form-control" required minlength="3" maxlength="20">
            <?php
            if (!empty($_SESSION['auth_username']))
            echo "<div class=\"invalid-feedback\">
                $_SESSION[auth_username]
            </div>";
            ?>
        </div>
        <small class="form-text text-muted"></small>
    </div>
    <br>
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <input name="password" type="password" class="form-control" required minlength="8" maxlength="20">
            <?php
            if (!empty($_SESSION['auth_password']))
            echo "<div class=\"invalid-feedback\">
                $_SESSION[auth_password]
            </div>";
            elseif (!empty($_SESSION['auth_error']))
            echo "<div class=\"invalid-feedback\">
                $_SESSION[auth_error] 
            </div>";
            ?>
        </div>
        <small class="form-text text-muted"></small>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>