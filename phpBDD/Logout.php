<?php
session_start ();
// On détruit les variables de notre session
unset($_SESSION['username']);
unset($_SESSION['email']);
session_unset ();
// On détruit notre session
session_destroy ();
?>
