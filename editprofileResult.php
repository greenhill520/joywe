
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/result.css" type="text/css" rel="stylesheet" />
    <title> 修改成功/失败页面 </title>
</head>
<body>
<div id="overall">
    <?php
    include_once 'control/control.php';
    $user = getDataById(new ReflectionClass('User'),'user',$_REQUEST['id']);
    $return = false;
    if( isset($_REQUEST['submit'])){
        if(isset($_REQUEST['picPath'])) {
            modify("user",array("PicPath"=>$_REQUEST['picPath']),$user->id);
        }
        else {
            modify("user",array("PicPath"=>$user->picPath),$user->id);
        }
        if(isset($_REQUEST['username'])) {
            modify("user",array("UserName"=>$_REQUEST['username']),$user->id);
        }
        if(isset($_REQUEST['info'])){
            modify("user",array("Info"=>$_REQUEST['info']),$user->id);
        }
        if(isset($_REQUEST['email'])){
            modify("user",array("Email"=>$_REQUEST['email']),$user->id);
        }
        if(isset($_REQUEST['phone'])){
            modify("user",array("Phone"=>$_REQUEST['phone']),$user->id);
        }
        if(isset($_REQUEST['birth'])){
            modify("user",array("Birth"=>$_REQUEST['birth']),$user->id);
        }
        if(isset($_REQUEST['city'])){
            modify("user",array("City"=>$_REQUEST['city']),$user->id);
        }
        if(isset($_REQUEST['sex'])) {
            $sex = "M";
            if($_REQUEST['sex'] == "女")
                $sex = "F";
            modify("user",array("Sex"=>$sex),$user->id);
        }
    }
    if($return) {
        ?>
        <div id ="failed">
            <p>登录失败，请检查您的用户名和密码 ,<a href="login.php">重新登录</a></p>
        </div>
    <?php }
    else{
        ?>
        <div id = "success">
            <p>修改成功，<a href="homepage.php?">返回个人主页</a></p>
        </div>
    <?php
    }
    ?>
</div>
</body>
</html>