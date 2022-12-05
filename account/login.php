<?php include '../view/header.php'; ?>
<form action="." method="POST">
    <input type="hidden" name="action" value="login">
    <input type="text" name="taikhoan">
    <input type="password" name="pass">
    <input type="submit" value="Login">
    
</form>

<?php include '../view/footer.php'; ?>