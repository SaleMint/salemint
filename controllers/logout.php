<?php
session_destroy();
setcookie("jwt", "", time() - 3600);
echo "<script> window.location.replace('/') </script>";