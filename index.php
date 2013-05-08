<?php
session_start();
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
$friNum = $user->getFriendNum();
$activities = $user->getActivities();
?>
<html>
	<head>
	<meta charset=utf-8" />
	<link href="css/index.css" rel="stylesheet" />
	<title> Joywe班级聚会 </title>
	</head>
	<body>
        <header>
    	<?php
		include_once 'control/header.php';
		?>
        </header>
        <article>
            <h2>个人主页</h2>
            <hr>
            <section>
                <h3>个人信息 <a href="#"><input type="button" value="编辑" style="float: right;"/></a></h3>
                <table>
                    <tr><td>个人头像：</td><td><img alt="userface" src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>"></td></tr>
                    <tr><td>个性签名：</td><td><?= $user->info?></td></tr>
                    <tr><td>用户名：</td><td><?= $user->name?></td></tr>
                    <tr><td>性别：</td><td><?= $user->sex == 'M'?'男':'女' ?></td></tr>
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
                        <td><?= $act->actname?></td>
                        <td><?= $act->actdate ?></td>
                        <td><?= $act->actloc?></td>
                        <td><?= $act->getUser()->name?></td>
                        <td><?= $act->actinfo?></td>
                    </tr>
                <?php } ?>
                </table>
            </section>
        </article>
        <aside>
            <h3>用户好友</h3>
            <?php
            foreach($friends as $friend) {
            ?>
            <dl>
                <dd>
                    <img alt="userface" src="images/<?php echo empty($friend->picPath)?'user.jpg':$friend->picPath?>">
                    <?= $friend->name?>
                </dd>
            </dl>
            <?php } ?>
        </aside>
	</body>
</html>
<?php } ?>