<?php
// router.php
phpinfo();
die();
if (preg_match('/\.(?:png|jpg|jpeg|gif|html|css|js|ico)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else {
    require 'index.php';
}
?>