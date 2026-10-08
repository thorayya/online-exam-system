<?php

session_start();

require_once "../function/pdo-connect.php";
require_once "../panel/header.php"; 

$error = '';

if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
}

if(isset($_POST['email']) && $_POST['email'] !== '' 
&& isset($_POST['code']) && $_POST['code'] !== ''){

    global $connection;

    $sql = "SELECT * FROM register.users WHERE email = ?";
    $statement = $connection -> prepare($sql);
    $statement->execute([$_POST['email']]);
    $user = $statement->fetch();
    if($user !== false){
        if(password_verify($_POST['code'],$user->code))
        {
            $_SESSION['user'] = $user->email;
            redirect('register/main.php');
        }
        else
        {
            $error = 'رمز عبور یا ایمیل وارد شده اشتباه است';
        }
    }
        
    else
    {
        $error = 'رمز عبور یا ایمیل وارد شده اشتباه است';
    }
}

else{
    if(!empty($_POST)){
            $error = "پر کردن تمام فیلدها الزامی است";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
   
</head>
<body>
    <div class="content">
        <div class="container">
            <form action="<?=url('register/login.php') ?>" method="post">
            <small style="color: red;"><?php if($error !== '')
            {echo $error;} ?>
                </small>
                <label>کد ملی</label>
                <input type="text" name="code" id="code" require>
                <label>پست الکترونیکی</label>
                <input type="email" name="email" id="email" require>
                <div class="button">
                    <input type="submit" value="ثبت نام" >
                    <input type="reset" value="انصراف">
                </div>
            </form>
        </div>
    </div>
</body>
</html>