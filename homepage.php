<?php
session_start();
include_once("control/control.php");
$user = getDataById(new ReflectionClass('User'),'user',$_SESSION['userID']);
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $user = getDataById(new ReflectionClass('User'),'user',$id);
}
$user2 = getDataById(new ReflectionClass('User'),'user',$_SESSION['userID']);
if($user == null) {
    include_once 'login.php';
}
else {
    $friends = $user->getFriends();
    $friNum = $user->getFriendNum();
    $activities = $user->getActivities();
    $actNum = $user->getActivityNum();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="css/index.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/bootstrap.min.js"></script>
        <script src="js/homepage.js"></script>
        <title> Joywe班级聚会 </title>
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
                    <? if( $user->id == $user2->id ) { ?>
                        <a href="makeactivity.php?id=<?=$user->id?>"><img src="images/fire_activity.png" /></a>
                        <a href="editprofile.php?id=<?=$user->id?>&method=information"><img src="images/setting.png" /></a>
                    <? } ?>
                </div>
                <div class="span3">
                    <a href="homepage.php?id=<?= $user2->id?>"><img class="joywe" src="images/joywe.png"/></a>
                    <table>
                    <tr><td class="actAndFriNum"><?= $actNum?></td><td class="actAndFriNum"><?= $friNum?></td></tr>
                    <tr><td>ACTIVITIES</td><td>FRIENDS</td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="content">
            <article>
                <? if( $user->id == $user2->id ) { ?>
                <section>
                    <h3>创建/加入活动</h3>
                    <table>
                        <tr style="text-align: center;"><td>活动名称</td><td>活动时间</td><td>活动地点</td><td>发起人</td><td>活动信息</td></tr>
                    <?php
                        foreach($activities as $act) {
                    ?>
                        <tr id="actcontent">
                            <td id="wid"><?= $act->actname?></td>
                            <td id="wid"><?= $act->actdateS ?>&nbsp;<?= $act->actstart?>:00 to <?= $act->actdateE ?>&nbsp;<?= $act->actend?>:00</td>
                            <td id="wid"><?= $act->actloc?></td>
                            <td id="wid"><?= $act->getUser()->name?></td>
                            <td id="wid"><?= $act->actinfo?>&nbsp;<strong>详情</strong></td>
                        </tr>
                    <?php } ?>
                    </table>
                    <div id="settings" style="display:none">
                    <label>生日</label>
                    <input id="birthday" type="text" placeholder="Birthday" maxlength="20" tabindex="2" name="birthday">
                    </div>
                </section>
            <? }   else { ?>
                <section>
                    <h3>用户信息</h3>
                    <table>
                        <tr><td>个性签名：</td><td><?= $user->info?></td></tr>
                        <tr><td>用户名：</td><td><?= $user->name?></td></tr>
                        <tr><td>性别：</td><td><?= $user->sex == 'M'?'男':'女' ?></td></tr>
                        <tr><td>邮箱：</td><td><?=$user->email?></td></tr>
                        <tr><td>手机：</td><td><?=$user->phone?></td></tr>
                        <tr><td>出生年月：</td><td><?= $user->birth?></td></tr>
                        <tr><td>居住城市：</td><td><?= $user->city?></td></tr>
                    </table>
                </section>
            <? } ?>
            </article>
            <aside>
                <h3>用户好友</h3>
                <?php
                $num = 0;
                if( $friNum > 5 ){
                    $num = 5;
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