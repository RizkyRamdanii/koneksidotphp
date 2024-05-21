<?php
session_start();
session_destroy(); // Destroy this session
header("Location: ../public/index.php");//harusnya sih redirect ke index.php di root folder yang ini!
exit;
