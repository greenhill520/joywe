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
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/homepage.js"></script>
        <script src="js/gFriend.js"></script>
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
    <div class="content">
        <article>
            <section>
                <h3>添加活动</h3>
                <form method="post" action="#" name="form4">
                    <table>
                        <tr><td>活动主题</td><td><input type="text" name="actname"/></td></tr>
                        <tr><td>活动地点</td><td><input type="text" name="actloc"/></td></tr>
                        <tr><td>活动时间</td>
                            <td><select onchange="getYear1(this);" id="actYear1"><option value="-1">--请选择--</option></select>年
                                <select onchange="getMonth1(this);" id="actMonth1"><option value="-1">--请选择--</option></select>月
                                <select onchange="getDay1(this);" id="actDay1"><option value="-1">--请选择--</option></select>日
                                <select onchange="getHour1(this);" id="actHour1"><option value="-1">--请选择--</option></select>时
                                <select onchange="getYear2(this);" id="actYear2"><option value="-1">--请选择--</option></select>年
                                <select onchange="getMonth2(this);" id="actMonth2"><option value="-1">--请选择--</option></select>月
                                <select onchange="getDay2(this);" id="actDay2"><option value="-1">--请选择--</option></select>日
                                <select onchange="getHour2(this);" id="actHour2"><option value="-1">--请选择--</option></select>时
                            </td>
                        </tr>
                        <tr id="people"><td>参与人员</td></tr>
                        <tr><td>活动简介</td><td><textarea rows="3" cols="20"></textarea></td></tr>
                        <tr><td><input type="submit" value="确认" name="submit"></td>
                            <td><a href="homepage.php?id=<?=$user->id?>"><input type="button" value="取消" /></a></td>
                        </tr>
                    </table>
                </form>
            </section>
        </article>
        <aside >
            <h3>可选好友</h3>
            <div id="friendLi"></div>
        </aside>
    </div>
    </body>
    </html>
<?php } ?>