<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); // stays in same auth folder
exit;
