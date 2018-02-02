<?php

if($_GET) exit;
if($_POST) exit;

$pass = array('cs545','sharath','12345');

#### Using SHA256 #######
$salt='agfg&9i8mf68';  # 12 character salt starting with $1$

for($i=0; $i<count($pass); $i++) 
        echo crypt($pass[$i],$salt)."......................\n";
?>