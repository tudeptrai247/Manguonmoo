<?php
    session_start();
    ob_start();
    include "./model/connectdb.php";
    include "./model/user.php";
    if((isset($_POST['dangnhap']))&&($_POST['dangnhap']))
    // kiểm tra đăng nhập có tồn tại và đc click chưa
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $role = checkuser($user,$pass);
        $_SESSION['role'] = $role;
        if($role==1) header('location:index.php');
        else
            $txt_err="User Name hoặc Password Không Tồn Tại";
        //  header ('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
<div class="main">
    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="user" id="">
        <input type="text" name="pass" id="">
        <input type="submit" name="dangnhap" value="Đăng Nhập">
        <?php
            if(isset($txt_err)&&($txt_err != ""))
            // kiểm tra có tồn tại và khác không
            {
                echo $txt_err;
            }
        ?>
    </form>
</div>
</body>
</html>