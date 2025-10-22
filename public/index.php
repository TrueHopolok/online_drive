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
<form action="/api/upload.php" method="post" enctype="multipart/form-data">
    <h3>Select file to upload:</h3>
    <div class="form-group">
        <input class="btn" type="file" name="file">
        <input class="btn btn-primary" type="submit" value="Upload File" name="submit">
    </div>
</form>

<?php
require_once "../private/db/file.php";
$files = file_getlist($_SESSION['username']);
if (count($files) != 0) {
    echo "<br><h3>Your uploaded files:</h3><br><ul>";
    foreach ($files as $file) {
        echo "<li>$file[0]<br>";
    }
    echo "</ul>";
}
require_once "../private/tmpl/footer.php";
?>