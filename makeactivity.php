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
       <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" />
        <link href="css/newactivity.css" rel="stylesheet" />
        <link href="images/icon.png" rel="shortcut icon">
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
                    <tr><td class="actAndFri">ACTIVITIES</td><td class="actAndFri">FRIENDS</td></tr>
                </table>
            </div>
        </div>
    </div>
    <div class="content">
        <article>
                <section class="new_activity">
                <div class="newactivity_banner">
                        <p>New Activity</p>
                </div>
                <form method="post" action="makeactivityResult.php?id=<?=$user->id?>" name="form4">
                    <table class="makeactivity_table">
                        <tr><td id="wid" class="activity_tag">活动主题*</td><td id="wid" class="activity_content"><input class="activity_content" type="text" name="actname" size="10"></td></tr>
                        <tr><td id="wid" class="activity_tag">活动地点*</td><td id="wid"><input class="activity_content" type="text" name="actloc"></td></tr>
                        <tr><td id="wid" class="activity_tag">活动开始时间*</td>
                            <td id="wid">
                                <select onchange="getYear1(this);" id="actYear1" class="year" name="year1"><option value="-1">--年--</option></select>
                                <select onchange="getMonth1(this);" id="actMonth1" class="month" name="month1"><option value="-1">--月--</option></select>
                                <select onchange="getDay1(this);" id="actDay1" class="day" name="day1"><option value="-1">--日--</option></select>
                                <select onchange="getHour1(this);" id="actHour1" class="time" name="hour1"><option value="-1">--时--</option></select>
                            </td>
                        </tr>
                        <tr><td id="wid" class="activity_tag">活动结束时间*</td>
                            <td id="wid">
                                <select onchange="getYear2(this);" id="actYear2" class="year"name="year2"><option value="-1">--年--</option></select>
                                <select onchange="getMonth2(this);" id="actMonth2" class="month" name="month2"><option value="-1">--月--</option></select>
                                <select onchange="getDay2(this);" id="actDay2" class="day" name="day2"><option value="-1">--日--</option></select>
                                <select onchange="getHour2(this);" id="actHour2" class="time" name="hour2"><option value="-1">--时--</option></select>
                            </td>
                        </tr>
                        <tr><td id="wid" class="activity_tag">参与人员</td><td id="wid" class="activity_content"><div id="people"></div></td></tr>
                        <tr><td id="wid" class="activity_tag">活动简介*</td><td id="wid" class="activity_content">
                                <textarea class="textarea" rows="3" cols="20" name="actinfo"></textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="newactivity_button">
                        <input class="btn btn-primary" type="submit" value="确认" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="homepage.php?id=<?=$user->id?>"><input class="btn btn-primary" type="button" value="取消" /></a></td>
                        <input style="display: none;" type="text" id="friID" name="friID">
                    </div>
                </form>
            </section>
        </article>
        <aside >
                <div class="friend_banner">
                    <p>My Friends</p>
                </div>
                <div class="input-append">
                     <form method="post" action="homepage.php?search=search" name="form1">
                    <input class="search" name="target" id="appendedInputButton" type="text">
                    <button id="search"  name="submit" class="btn" type="submit">Search</button>
                    </form>
                </div>
                 <div id="friendLi"></div>
        </aside>
        <div class="clear">
        </div>
    </div>
         <?php include("footer.php");?>
    </body>
    </html>
<?php } ?>