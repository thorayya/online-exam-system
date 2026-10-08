<?php

require_once "../function/pdo-connect.php";
require_once "../panel/header.php"; 

$error = '';

if(isset($_POST['fname']) && $_POST['fname'] !== ''
    && isset($_POST['lname']) && $_POST['lname'] !== '' 
    && isset($_POST['code']) && $_POST['code'] !== ''
    && isset($_POST['email']) && $_POST['email'] !== ''){

$sql = "SELECT * FROM `users` WHERE email = ? ";
$statement = $connection -> prepare($sql);
$statement->execute([$_POST['email']]);
$user = $statement->fetch();
if($user === false)
{

$sql = "INSERT INTO `users`(`code`, `fname`, `lname`, `tel`, `email`, `stat`) VALUES (?,?,?,?,?,?)";

$statement = $connection -> prepare($sql);
$password = password_hash($_POST['code'], PASSWORD_DEFAULT);

$statement->execute([$password,$_POST['fname'],$_POST['lname'],$_POST['tel'],$_POST['email'],$_POST['state']]);

}
else{
    $error = 'ایمیل وارد شده تکرای می باشد';
}
redirect("register/login.php");
}

else
{
    if(!empty($_POST))
    $error = 'همه فیلد ها اجباری هستند';
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
            <form action="<?=url('register/register.php') ?>" method="post">
            <small style="color: red;"><?php if($error !== '')
            {
                echo $error;
                } ?>
                </small>
                <label>نام</label>
                <input type="text" name="fname" id="fname" require>
                <label>نام خانوادگی</label>
                <input type="text" name="lname" id="lname" require>
                <label>کد ملی</label>
                <input type="text" name="code" id="code" require>
                <label>تلفن همراه <span>آزمون دهنده</span></label>
                <input type="tel" name="tel" id="tel">
                <label>پست الکترونیکی</label>
                <input type="email" name="email" id="email" require>
                <label>استان</label>
                <div class="tooc-select">
                <select id="state" name="state">
                    <option value="East-Azerbaijan">آذربایجان شرقی</option>
                    <option value="West-Azerbaijan">آذربایجان غربی</option>
                    <option value="Ardabil">اردبیل</option>
                    <option value="Isfahan" selected>اصفهان</option>
                    <option value="Alborz">البرز</option>
                    <option value="Ilam">ایلام</option>
                    <option value="Bushehr">بوشهر</option>
                    <option value="Tehran">تهران</option>
                    <option value="South-Khorasan">خراسان جنوبی</option>
                    <option value="Razavi-Khorasan">خراسان رضوی</option>
                    <option value="North-Khorasan">خراسان شمالی</option>
                    <option value="Khuzestan">خوزستان</option>
                    <option value="Zanjan">زنجان</option>
                    <option value="Semnan">سمنان</option>
                    <option value="Sistan-and-Baluchestan">سیستان و بلوچستان</option>
                    <option value="Fars">فارس</option>
                    <option value="Qazvin">قزوین</option>
                    <option value="Qom">قم</option>
                    <option value="Lorestan">لرستان</option>
                    <option value="Mazandaran">مازندران</option>
                    <option value="Markazi">مرکزی</option>
                    <option value="Hormozgan">هرمزگان</option>
                    <option value="Hamedan">همدان</option>
                    <option value="Chaharmahal-and-Bakhtiari">چهارمحال و بختیاری</option>
                    <option value="Kurdistan">کردستان</option>
                    <option value="Kerman">کرمان</option>
                    <option value="Kermanshah">کرمانشاه</option>
                    <option value="Kohgiluyeh-and-Boyer-Ahmad">کهگیلویه و بویراحمد</option>
                    <option value="Golestan">گلستان</option>
                    <option value="Gilan">گیلان</option>
                    <option value="Yazd">یزد</option>
                </select>
                <div class="tooc"></div>
                </div>
                <div class="button">
                    <input type="submit" value="ثبت نام" >
                    <input type="reset" value="انصراف">
                </div>
            </form>
        </div>
    </div>
</body>
</html>