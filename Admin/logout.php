<?php

session_start();

session_unset("student");

session_destroy();

header("location:index.html");
?>
