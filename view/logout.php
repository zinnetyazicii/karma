<?php
unset($_SESSION["user"]);
unset($_SESSION["role"]);
unset($_SESSION["uname"]);
session_destroy();
echo '<meta http-equiv="refresh"content="0; url='.$url.'/login">';
exit();
?>