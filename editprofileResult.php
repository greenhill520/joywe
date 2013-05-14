
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
    $methods;
    $return = 0;
    $choose = array(0,0,0,0,0,0,0,0,0,0);
    if( isset($_REQUEST['submit'])){
        if(isset($_REQUEST['method'])) {
            $methods = $_REQUEST['method'];
            if($methods == "information") {
                if(isset($_REQUEST['picPath'])) {
                    $return = modify("user",array("PicPath"=>$_REQUEST['picPath']),$user->id);
                    if( $return = null) {
                        $choose[0] = 1;
                    }
                }
                else {
                    $return = modify("user",array("PicPath"=>$user->picPath),$user->id);
                    if( $return = null) {
                        $choose[0] = 1;
                    }
                }
                if(isset($_REQUEST['username'])) {
                    $return = modify("user",array("UserName"=>$_REQUEST['username']),$user->id);
                    if( $return = null) {
                        $choose[1] = 1;
                    }
                }
                if(isset($_REQUEST['info'])){
                    $return = modify("user",array("Info"=>$_REQUEST['info']),$user->id);
                    if( $return = null) {
                        $choose[2] = 1;
                    }
                }
                if(isset($_REQUEST['email'])){
                    $return =  modify("user",array("Email"=>$_REQUEST['email']),$user->id);
                    if( $return = null) {
                        $choose[3] = 1;
                    }
                }
                if(isset($_REQUEST['phone'])){
                    $return = modify("user",array("Phone"=>$_REQUEST['phone']),$user->id);
                    if( $return = null) {
                        $choose[4] = 1;
                    }
                }
                if(isset($_REQUEST['birth'])){
                    $return = modify("user",array("Birth"=>$_REQUEST['birth']),$user->id);
                    if( $return = null) {
                        $choose[5] = 1;
                    }
                }
                if(isset($_REQUEST['city'])){
                    $return = modify("user",array("City"=>$_REQUEST['city']),$user->id);
                    if( $return = null) {
                        $choose[6] = 1;
                    }
                }
                if(isset($_REQUEST['sex'])) {
                    $return = modify("user",array("Sex"=>$_REQUEST['sex']),$user->id);
                    if( $return = null) {
                        $choose[7] = 1;
                    }
                }
            }
            else {
                if(isset($_REQUEST['oriPass']) && isset($_REQUEST['newPass']) && isset($_REQUEST['conPass']) ) {
                    $oripass = $_REQUEST['oriPass'];
                    $newpass = $_REQUEST['newPass'];
                    $conpass = $_REQUEST['conPass'];
                    $pwmd = md5(md5($oripass));
                    if( $pwmd != $user->password )
                        $choose[8] = 1;
                    else if($newpass == $conpass)
                        $choose[9] = 1;
                    if( $pwmd == $user->password && $newpass == $conpass) {
                        modifyPassword($user->id,$newpass);
                    }
                }
            }
        }
    }
    if($choose[0] == 1) {
        ?>
        <div id ="failed">
            <p>头像添加失败，请检查信息 ，<a href="editprofile.php?id=<?=$user->id?>&method=<?=$methods?>">">返回修改</a></p>
        </div>
    <?php }
    else if($choose[1] == 1) {
        ?>
        <div id ="failed">
            <p>用户名修改失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[2] == 1) {
        ?>
        <div id ="failed">
            <p>个性签名修改失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[3] == 1) {
        ?>
        <div id ="failed">
            <p>邮箱修改失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[4] == 1) {
        ?>
        <div id ="failed">
            <p>手机修改失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[5] == 1) {
        ?>
        <div id ="failed">
            <p>生日修改失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[6] == 1) {
        ?>
        <div id ="failed">
            <p>城市修改失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[7] == 1) {
        ?>
        <div id ="failed">
            <p>性别修改失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[8] == 1) {
        ?>
        <div id ="failed">
            <p>原密码输入错误，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
        </div>
    <?php }
    else if($choose[9] == 1) {
        ?>
        <div id ="failed">
            <p>新密码确认失败，请检查信息 ，<a href="editprofile.php?id=<?= $user->id?>&method=<?=$methods?>">返回修改</a></p>
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