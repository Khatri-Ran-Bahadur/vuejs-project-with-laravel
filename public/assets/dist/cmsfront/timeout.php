<? ob_start(); ?>
<?php
include("includes/config.php");
session_start();
setcookie(session_name(),"",time()-3600);
session_destroy();
//if(session_destroy())
//{
header("Location:index.php?msg=lterr");
//}
?>
<? ob_flush(); ?>