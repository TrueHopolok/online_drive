<?php
session_start();
$title = "Home";
require_once "tmpl_header.php";
?>

<?php
if (empty($_SESSION['username'])) {
    echo '
    <h2>Welcome unknown!</h2>
    <p>Please login into account to access your files</p>
    ';
    require_once "tmpl_footer.php";
    exit;
}
?>

<h2>Welcome back @<? $_SESSION['username'] ?>!</h2>


<?php
require_once "tmpl_footer.php";
?>