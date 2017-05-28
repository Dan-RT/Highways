<?php

session_start();

if (isset($_POST['user_name'])) {
    if ($_POST['user_name'] == 'admin') {
        $_SESSION['connected'] = true;
    }
} else {
    $_SESSION['connected'] = false;
}



?>



<script>
    window.location.replace("index.php");
</script>
