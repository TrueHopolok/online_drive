<?php
session_start();
$title = "Home";
require_once "../private/tmpl/header.php";
?>

<?php
if (empty($_SESSION['auth'])) {
    echo '
    <h2>Welcome unknown!</h2>
    <p>Please login into account to access your files</p>
    ';
    require_once "../private/tmpl/footer.php";
    exit;
}
?>

<h2>Welcome back <b><?= $_SESSION['username'] ?></b>!</h2>
<p>Congrats on getting here.</p>


<?php
require_once "../private/tmpl/footer.php";
?>