<?php

$title = 'Logout';
$class = 'logout';

setcookie('remember', NULL, -1);
unset($_SESSION['auth']);
header('Location: '.URL);
exit;
