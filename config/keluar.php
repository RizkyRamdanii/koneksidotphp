<?php
session_start();
session_destroy(); // Destroy this session
header("Location: ../public/index.php");// redirect to index.php
exit;
