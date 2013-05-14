<?php
include_once 'control/control.php';
$user = getDataById(new ReflectionClass('User'),'user',$_REQUEST['id']);
if($user == null) {
    include_once 'login.php';
}
else {
    $friends = $user->getFriends();
    $friNum = $user->getFriendNum();
    $actNum = $user->getActivityNum();
?>
<!DOCTYPE html>
    <html>
    <head>
        <link href="css/index.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/bootstrap.min.js"></script>
        <script src="js/homepage.js"></script>
        <title> Joywe班级聚会 </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    <div class="header_home">
        <div class="header_top">
            <a href="control/logout.php"><img style="width:24px; height:24px;" title="logout" src="images/logout.png"></a>
        </div>

        <div class="header_content">
            <div class="span3">
                <a href="homepage.php?id=<?= $user->id?>"><img id="user_img" alt="userface" src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>"/></a>
            </div>
            <div class="span5">
                <div class="name"><?= $user->name?></div>
                <div class="info"><?= $user->info?></div>
            </div>
            <div class="span3">
                <a href="homepage.php?id=<?= $user->id?>"><img class="joywe" src="images/joywe.png"/></a>
                <table>
                    <tr><td class="actAndFriNum"><?= $actNum?></td><td class="actAndFriNum"><?= $friNum?></td></tr>
                    <tr><td>ACTIVITIES</td><td>FRIENDS</td></tr>
                </table>
            </div>
        </div>
    </div>
    <?php $methods = $_REQUEST['method'] ?>
    <div class="content">
        <article>
            <?php if($methods == "information") { ?>
            <section>
                <h3>修改个人信息</h3>
                <form method="post" action="editprofileResult.php?id=<?= $user->id?>" name="form2">
                    <table>
                        <tr><td>个人头像：</td><td><img style="width:60px;height: 60px;" alt="userface" src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>"></td>
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
                        <tr><td>邮箱：</td><td><input type="text" name="email" value="<?=$user->email?>"/></td></tr>
                        <tr><td>手机：</td><td><input type="text" name="phone" value="<?=$user->phone?>"/></td></tr>
                        <tr><td>出生年月：</td><td><input type="text" name="birth" value="<?= $user->birth?>"/></td></tr>
                        <tr><td>居住城市：</td><td><input type="text" name="city" value="<?= $user->city?>"/></td></tr>
                        <tr><td>注册时间:</td><td><?= $user->createTime?></td></tr>
                        <tr><td><input type="submit" value="确认" name="submit"></td>
                            <td><a href="homepage.php?id=<?=$user->id?>"><input type="button" value="取消" /></a></td>
                        </tr>
                        <input style="display: none" name="method" value = "information"/>
                    </table>
                </form>
            </section>
        <?php } else { ?>
            <section>
                <h3>修改密码</h3>
                <form method="post" action="editprofileResult.php?id=<?= $user->id?>" name="form3">
                    <table>
                        <tr><td>原密码：</td><td><input type="password" name="oriPass"/></td></tr>
                        <tr><td>新密码：</td><td><input type="password" name="newPass"/></td></tr>
                        <tr><td>确认新密码：</td><td><input type="password" name="conPass"/></td></tr>
                        <tr><td><input type="submit" value="确认" name="submit"></td>
                            <td><a href="homepage.php?id=<?= $user->id?>"><input type="button" value="取消" /></a></td>
                        </tr>
                        <input style="display: none" name="method" value = "passW"/>
                    </table>
                </form>
            </section>
        <?php } ?>
        </article>
        <aside>
            <?php
            $num = 0;
            if( $friNum > 7 ){
                $num = 7;
            }
            else {
                $num = $friNum;
            }
            for($i = 0; $i < $num; $i++) {
                ?>
                <dl>
                    <dd>
                        <img alt="userface" style="width: 60px; height: 60px;"src="images/<?php echo empty($friends[$i]->picPath)?'user.jpg':$friends[$i]->picPath?>">
                        <a href="homepage.php?id=<?=$friends[$i]->id?>"><?= $friends[$i]->name?></a>
                    </dd>
                </dl>
            <?php } ?>
        </aside>
    </div>
    </body>
    </html>
<?php } ?>