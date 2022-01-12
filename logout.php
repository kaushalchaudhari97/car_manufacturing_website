<?php 

// Destroy session
//session_destroy();
//header('Location: index.php');
?>
<?php
session_start();
        $_SESSION[uname]="";
        $_SESSION[logged]="";
        header('Location: index.php');
    session_unset();
    session_regenerate_id();
?>
<script>
//self.location="index.php";
</script>