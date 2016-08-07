<?php

# BikeShed version 0.0.0.2
# File version 0.0.0.6

# BikeShed
# https://github.com/Trekkie101/bikeshed

# logout.php
# End the show, please, log everyone out, destroy the session, raise the fortress gates


session_start();
session_destroy();
session_unset();

header("Location: index.php");


?>
