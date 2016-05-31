<?php
session_start();
session_unset();
session_destroy();
ob_start();
echo "<script>document.location.href='index.php';</script>";
?>