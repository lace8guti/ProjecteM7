<?php

session_start();
session_unset();
session_destroy();

header("Location: ../logic2.php");

?>