<?php
include_once 'control/header.php';
include_once("control/control.php");
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $user = getDataById(new ReflectionClass('User'),'user',$id);
}
$user2 = getDataById(new ReflectionClass('User'),'user',$_SESSION['userID']);
if($user == null) {
    include_once 'login.php';
}
else {
?>
<!DOCTYPE html>
<?php
    $friends = $user->getFriends();
    $friNum = $user->getFriendNum();
    $activities = $user->getActivities();
    $actNum = $user->getActivityNum();
?>
<html>
	<head>
	<meta charset=utf-8" />
	<link href="css/index.css" rel="stylesheet" />
	<title> Joywe班级聚会 </title>
	</head>
	<body>
        <article>
            <h2>个人主页</h2>
            <hr>
            <? if( $user->id == $user2->id ) { ?>
            <section>
                <h3>个人信息 <a href="editprofile.php?id=<?=$user->id?>"><?php $_SESSION['id'] = $user->id;?>
                        <input type="button" value="编辑" style="float: right;"/></a></h3>
                <table>
                    <tr><td>个人头像：</td><td><img alt="userface" src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>"></td></tr>
                    <tr><td>Activities</td><td>Friends</td></tr>
                    <tr><td><?= $actNum?></td><td><?= $friNum?></td></tr>
                    <tr><td>个性签名：</td><td><?= $user->info?></td></tr>
                    <tr><td>用户名：</td><td><?= $user->name?></td></tr>
                    <tr><td>性别：</td><td><?= $user->sex == 'M'?'男':'女' ?></td></tr>
                    <tr><td>邮箱：</td><td><?=$user->email?></td></tr>
                    <tr><td>手机：</td><td><?=$user->phone?></td></tr>
                    <tr><td>出生年月：</td><td><?= $user->birth?></td></tr>
                    <tr><td>居住城市：</td><td><?= $user->city?></td></tr>
                    <tr><td>注册时间:</td><td><?= $user->createTime?></td></tr>
                </table>
            </section>
            <hr>
            <section>
                <h3>创建/加入活动 <a href="#"><input type="button" value="创建活动" style="float: right;"/></a></h3>
                <table>
                    <tr style="text-align: center;"><td>活动名称</td><td>活动时间</td><td>活动地点</td><td>发起人</td><td>活动信息</td></tr>
                <?php
                    foreach($activities as $act) {
                ?>
                    <tr style="text-align: center;">
                        <td rowspan="2" id="wid"><?= $act->actname?></td>
                        <td rowspan="2" id="wid"><?= $act->actdate ?>&nbsp;<?= $act->actstart?>:00 - <?= $act->actdate ?>&nbsp;<?= $act->actend?>:00</td>
                        <td rowspan="2" id="wid"><?= $act->actloc?></td>
                        <td rowspan="2" id="wid"><?= $act->getUser()->name?></td>
                        <td id="wid"><?= $act->actinfo?></td>
                    </tr>
                    <tr><td><input type="button" value="详情" style="float: right;"/><input type="button" value="删除" style="float: right;"/></td></tr>
                <?php } ?>
                </table>
            </section>
        <? }   else { ?>
        <section>
            <h3>个人信息</h3>
            <table>
                <tr><td>个人头像：</td><td><img alt="userface" src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>"></td></tr>
                <tr><td>Activities</td><td>Friends</td></tr>
                <tr><td><?= $actNum?></td><td><?= $friNum?></td></tr>
                <tr><td>个性签名：</td><td><?= $user->info?></td></tr>
                <tr><td>用户名：</td><td><?= $user->name?></td></tr>
                <tr><td>性别：</td><td><?= $user->sex == 'M'?'男':'女' ?></td></tr>
                <tr><td>邮箱：</td><td><?=$user->email?></td></tr>
                <tr><td>手机：</td><td><?=$user->phone?></td></tr>
                <tr><td>出生年月：</td><td><?= $user->birth?></td></tr>
                <tr><td>居住城市：</td><td><?= $user->city?></td></tr>
                <tr><td>注册时间:</td><td><?= $user->createTime?></td></tr>
            </table>
        </section>
        <? } ?>
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