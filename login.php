<?php
session_start();

if (!empty($_SESSION['username'])) {
    http_response_code(303);
    header("Location: index.php");
    exit;
}

$title = "Login";
require_once "tmpl_header.php";
?>

<form class=<?php echo empty($_SESSION['login_attempted']) ? "needs-validation" : "was-validated"; ?> method="post"
    action="api_login.php" novalidate>
    <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group">
            <input name="username" type="text" class="form-control" required minlength="3" maxlength="20">
            <div class="invalid-feedback">
                Please input valid username.
            </div>
        </div>
        <small class="form-text text-muted"></small>
    </div>
    <br>
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
            <input name="password" type="password" class="form-control" required minlength="8" maxlength="20">
            <div class="invalid-feedback">
                Please input valid password.
            </div>
        </div>
        <small class="form-text text-muted"></small>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require_once "tmpl_footer.php";
?>