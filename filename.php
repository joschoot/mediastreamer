<?php

#include('fileUpload.php');

echo shell_exec("echo /var/www/html/uploads/autisme_mer_test.mp4 | cut -d '/' -f 6");

?>