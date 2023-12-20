<?php
header("location:".$webURL);
@session_destroy();
@ob_end_flush();
//exit();
?>

