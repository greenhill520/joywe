<?php
include_once 'control/header.php';
include_once("control/control.php");
$user = getDataById(new ReflectionClass('User'),'user',$_SESSION['userID']);
if($user == null) {
    include_once 'login.php';
}
else {
    ?>
    <!DOCTYPE html>
    <?php
    $friends = $user->getFriends();
    ?>
    <html>
    <head>
        <meta charset=utf-8" />
        <link href="css/index.css" rel="stylesheet" />
        <title> Joywe班级聚会 </title>
    </head>
    <body>
    <article>
        <h2>修改个人信息</h2>
        <hr>
        <section>
            <form method="post" action="editprofileResult.php?id=<?= $user->id?>" name="form2">
            <table>
                <tr><td>个人头像：</td><td><img alt="userface" src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>"></td>
                </tr>
                <tr><td><label class="editLabel">上传:</label></td><td><input type="file" name="picPath" value="<?= $user->picPath?>"></td></tr>
                <tr><td>个性签名：</td><td><input type="text" name="info" value="<?= $user->info?>"/></td></tr>
                <tr><td>用户名：</td><td><input type="text" name="username" value="<?= $user->name?>"/></td></tr>
                <tr><td>性别：</td>
                    <td>
                        <?php if($user->sex == "M") { ?>
                        <input type="radio" name="sex" value="M" checked="checked"/> 男
                        <input type="radio" name="sex" value="F" /> 女
                        <?php } else { ?>
                        <input type="radio" name="sex" value="M"/> 男
                        <input type="radio" name="sex" value="F" checked="checked" /> 女
                        <?php } ?>
                    </td>
                </tr>
                <tr><td>邮箱：</td><td><input type="test" name="email" value="<?=$user->email?>"/></td></tr>
                <tr><td>手机：</td><td><input type="test" name="phone" value="<?=$user->phone?>"/></td></tr>
                <tr><td>出生年月：</td><td><input type="text" name="birth" value="<?= $user->birth?>"/></td></tr>
                <tr><td>居住城市：</td><td><input type="text" name="city" value="<?= $user->city?>"/></td></tr>
                <tr><td>注册时间:</td><td><?= $user->createTime?></td></tr>
                <tr><td><input type="submit" value="确认" name="submit"></td>
                    <td><a href="homepage.php?id=<?=$user->id?>"><input type="button" value="取消" /></a></td>
                </tr>
            </table>
            </form>
        </section>
    </article>
    <aside>
        <h3>用户好友</h3>
        <?php
        foreach($friends as $friend) {
            ?>
            <dl>
                <hr>
                <dd>
                        <img alt="userface" src="images/<?php echo empty($friend->picPath)?'user.jpg':$friend->picPath?>">
                    <a href="homepage.php?id=<?=$friend->id?>"><?= $friend->name?></a>
                </dd>
            </dl>
        <?php } ?>
    </aside>
    </body>
    </html>
<?php } ?>