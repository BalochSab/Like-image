<?php
session_start();
session_destroy();
session_unset($_SESSION["u_id"]);
session_unset($_SESSION["username"]);

?>