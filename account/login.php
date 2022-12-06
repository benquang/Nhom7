<?php include '../view/header.php'; ?>
<form action="." method="POST">
    <input type="hidden" name="action" value="login">
    <input type="text" name="taikhoan">
    <input type="password" name="pass">
    <input type="submit" value="Login">
    
</form>
<?php
    if ($_SESSION["message"] !=null)
    {
        print_r($_SESSION["message"]);
        $_SESSION["message"] = null;
    }

?>
<?php include '../view/footer.php'; ?>