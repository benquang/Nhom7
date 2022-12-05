<?php include '../view/header.php'; ?>
<form action="." method="POST">
    <input type="hidden" name="action" value="changePass">
    <input type="password" name="pass">
    <input type="password" name="confirm_pass">
    <input type="submit" value="Submit">
</form>
<?php
    if ($_SESSION["message"] !=null)
        print_r($_SESSION["message"]);
    $_SESSION["message"] = null;
?>


<?php include '../view/footer.php'; ?>