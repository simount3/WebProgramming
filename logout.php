<?php
session_start();
session_unset();
session_destroy();
?>
<script>
    alert('Logged out successfully.')
    location.replace('mainpage.php');
</script>