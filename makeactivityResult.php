﻿
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/result.css" type="text/css" rel="stylesheet" />
    <link href="images/icon.png" rel="shortcut icon">
    <title> 添加成功/失败页面 </title>
</head>
<body>
<div id="overall">
    <?php
    include_once 'control/control.php';
    $user = getDataById(new ReflectionClass('User'),'user',$_REQUEST['id']);
    $choose = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $temp = array();
    $temp2 = array();
    $acttimeS;
    $acttimeE;
    $actname;
    if(empty($_REQUEST['actname']))
        $choose[0] = 1;
    else {
        $actname = $_REQUEST['actname'];
    }
    $actloc;
    if(empty($_REQUEST['actloc']))
        $choose[1] = 1;
    else {
        $actloc = $_REQUEST['actloc'];
    }
    $year1;
    if(empty($_REQUEST['year1']))
        $choose[2] = 1;
    else {
        $year1 = $_REQUEST['year1'];
        array_push($temp,$year1);
    }
    $month1;
    if(empty($_REQUEST['month1']))
        $choose[3] = 1;
    else {
        $month1 = $_REQUEST['month1'];
        array_push($temp,$month1);
        $acttimeS = implode("-",$temp);
    }
    $day1;
    if(empty($_REQUEST['day1']))
        $choose[4] = 1;
    else {
        $day1 = $_REQUEST['day1'];
        array_push($temp,$day1);
    }
    $hour1;
    if(empty($_REQUEST['hour1']))
        $choose[5] = 1;
    else {
        $hour1 = $_REQUEST['hour1'];
    }
    $year2;
    if(empty($_REQUEST['year2']))
        $choose[6] = 1;
    else {
        $year2 = $_REQUEST['year2'];
        array_push($temp2,$year2);
    }
    $month2;
    if(empty($_REQUEST['month2']))
        $choose[7] = 1;
    else {
        $month2 = $_REQUEST['month2'];
        array_push($temp2,$month2);
    }
    $day2;
    if(empty($_REQUEST['day2']))
        $choose[8] = 1;
    else {
        $day2 = $_REQUEST['day2'];
        array_push($temp2,$day2);
        $acttimeE = implode("-",$temp2);
    }
    $hour2;
    if(empty($_REQUEST['hour2']))
        $choose[9] = 1;
    else {
        $hour2 = $_REQUEST['hour2'];
    }
    $friid;
    if(empty($_REQUEST['friID']))
        $choose[10] = 1;
    else {
        $friid = $_REQUEST['friID'];
        $friID = explode("-",$friid);
    }
    $actinfo;
    if(empty($_REQUEST['actinfo']))
        $choose[11] = 1;
    else {
        $actinfo = $_REQUEST['actinfo'];
    }
    if($choose[0] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动主题不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[1] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动地点不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[2] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动开始年份不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[3] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动开始月份不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[4] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动开始天不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[5] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动开始时间不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[6] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动结束年份不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[7] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动结束月份不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[8] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动活动结束天不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[9] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动结束时间不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[10] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动参与人员不能为空，请在右边进行选择参与人员！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else if($choose[11] == 1) {
        ?>
        <div id = "failed" class="success">
            <a href="makeactivity.php?id=<?=$user->id?>">
                <img width="600" height="600" src="images/activity_fail.png">
            </a>
            <script type="text/javascript">
                alert("活动添加失败，活动简介不能为空！");
                setTimeout("window.location.href='makeactivity.php?id=<?=$user->id?>'",300);
            </script>
        </div>
    <?php }
    else{
        $actID = addActivity($actname,$actinfo,$user->id,$acttimeS,$acttimeE,$hour1,$hour2,$actloc);
        if($actID) {
            for( $i = 0; $i < count($friID); $i++) {
                addInActivity($friID[$i],$actID);
            }
        }
        ?>
        <div id = "success" class="success">
            <a href="homepage.php">
                <img width="600" height="600" src="images/activity_success.png">
            </a>
            <script type="text/javascript">
                setTimeout("window.location.href='homepage.php'",1000);
            </script>
        </div>
    <?php
    }
    ?>
</div>
</body>
</html>