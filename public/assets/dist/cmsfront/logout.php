<? ob_start(); ?>
<?php
session_start();
setcookie(session_name(),"",time()-3600);
session_destroy();
//if(session_destroy())
//{
header("Location:index.php?msg=lsucc");
//}
?>
<? ob_flush(); ?>