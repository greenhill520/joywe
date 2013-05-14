<?php
session_start();
include_once("control/control.php");
include_once("control/datetime.php");
$user = getDataById(new ReflectionClass('User'),'user',$_SESSION['userID']);
$friends = $user->getFriends();
$friNum = $user->getFriendNum();
$flag = 0;
$suitFri;
$year1 = 2012;
$month1 = 1;
$day1 = 1;
$start = -1;
$year2 = 2100;
$month2 = 12;
$day2 = 31;
$end = 24;
if(isset($_REQUEST['y1'])) {
    $year1 = $_REQUEST['y1'];
    echo($year1 );
    $flag = 1;
}
if(isset($_REQUEST['m1'])) {
    $month1 = $_REQUEST['m1'];
    echo("-");
    echo($month1);
    $flag = 1;
}
if(isset($_REQUEST['d1'])) {
    $day1 = $_REQUEST['d1'];
    echo("-");
    echo($day1);
    $flag = 1;
}
if(isset($_REQUEST['s1'])) {
    $start = $_REQUEST['s1'];
    echo(" ");
    echo($start);
    $flag = 1;
}
if(isset($_REQUEST['y2'])) {
    $year2 = $_REQUEST['y2'];
    echo(" to ");
    echo($year2 );
    $flag = 1;
}
if(isset($_REQUEST['m2'])) {
    $month2 = $_REQUEST['m2'];
    echo("-");
    echo($month2);
    $flag = 1;
}
if(isset($_REQUEST['d2'])) {
    $day2 = $_REQUEST['d2'];
    echo("-");
    echo($day2);
    $flag = 1;
}
if(isset($_REQUEST['s2'])) {
    $end = $_REQUEST['s2'];
    echo(" ");
    echo($end);
    $flag = 1;
}
$suitFri = array();
$chooseDate1 = new DateT($year1,$month1,$day1,$start);
$chooseDate2 = new DateT($year2,$month2,$day2,$end);
foreach( $friends as  $fri ){
    $activity = $fri->getActivities();
    $tf = true;
    foreach( $activity as $act) {
        $datetimeS = $act->actdateS;
        $datetimeE = $act->actdateE;
        $datestart = $act->actstart;
        $dateend = $act->actend;
        $dsA = explode("-",$datetimeS);
        $deA = explode("-",$datetimeE);
        if( ($chooseDate1->isLess($dsA[0],$dsA[1],$dsA[2],$datestart) && $chooseDate1->isMore($deA[0],$deA[1],$deA[2],$dateend) &&
            $chooseDate2->isLess($deA[0],$deA[1],$deA[2],$dateend)) ||($chooseDate1->isMore($dsA[0],$dsA[1],$dsA[2],$datestart) &&
            $chooseDate2->isLess($dsA[0],$dsA[1],$dsA[2],$datestart) && $chooseDate2->isLess($deA[0],$deA[1],$deA[2],$dateend))||
            ($chooseDate1->isMore($deA[0],$deA[1],$deA[2],$dateend) && $chooseDate2->isLess($dsA[0],$dsA[1],$dsA[2],$datestart) &&
            $chooseDate2->isMore($deA[0],$deA[1],$deA[2],$dateend))) {
            $tf = false;
            break;
        }
    }
    if( $tf )
        array_push($suitFri,$fri->id);
}
$suitLength = count($suitFri);
if($user == null) {
    include_once 'login.php';
}
else {
    if( $flag == 0) {
?>
    <dl>
        <dd>
            <img alt="userface" style="width: 60px; height: 60px;"src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>">
            <a href="homepage.php?id=<?=$user->id?>"><?= $user->name?></a>
        </dd>
    </dl>
<?php
    for($i = 0; $i < $friNum; $i++) {
?>
    <dl>
        <dd>
            <img alt="userface" style="width: 60px; height: 60px;"src="images/<?php echo empty($friends[$i]->picPath)?'user.jpg':$friends[$i]->picPath?>">
            <a href="homepage.php?id=<?=$friends[$i]->id?>"><?= $friends[$i]->name?></a>
        </dd>
    </dl>
<?php } }
    else {
?>
    <dl>
        <dd>
            <img alt="userface" style="width: 60px; height: 60px;"src="images/<?php echo empty($user->picPath)?'user.jpg':$user->picPath?>">
            <a href="homepage.php?id=<?=$user->id?>"><?= $user->name?></a>   <input type="checkbox" value="<?=$user->id?>" checked="true">
        </dd>
    </dl>
    <?php
        for($i = 0; $i < $suitLength; $i++) {
            $fri = getDataById(new ReflectionClass('User'),'user',$suitFri[$i]);
            ?>
    <dl>
         <dd>
             <img alt="userface" style="width: 60px; height: 60px;"src="images/<?php echo empty($fri->picPath)?'user.jpg':$fri->picPath?>">
             <a href="homepage.php?id=<?=$fri->id?>"><?= $fri->name?></a><input type="checkbox" value="<?=$fri->id?>" >
         </dd>
    </dl>
<?php }
    }
} ?>