
var userid;
var year1;
var month1
var day1;
var hour1;
var year2;
var month2;
var day2;
var hour2;

$(document).ready(function() {
        userid = $('#userid').value;
        $('#friendLi').load("gFriendLi.php",{id:userid});
    }
);
function getYear1(selectPress) {
    year1 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1});
}
function getMonth1(selectPress) {
    month1 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1,m1:month1});
}
function getDay1(selectPress) {
    day1 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1,m1:month1,d1:day1});
}
function getHour1(selectPress) {
    hour1 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1,m1:month1,d1:day1,s1:hour1});
}
function getYear2(selectPress) {
    year2 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1,m1:month1,d1:day1,s1:hour1,
                                        y2:year2});
}
function getMonth2(selectPress) {
    month2 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1,m1:month1,d1:day1,s1:hour1,
                                        y2:year2,m2:month2});
}
function getDay2(selectPress) {
    day2 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1,m1:month1,d1:day1,s1:hour1,
                                        y2:year2,m2:month2,d2:day2});
}
function getHour2(selectPress) {
    hour2 = selectPress.options[selectPress.selectedIndex].value;
    $('#friendLi').load("gFriendLi.php",{id:userid,y1:year1,m1:month1,d1:day1,s1:hour1,
                                        y2:year2,m2:month2,d2:day2,s2:hour2});
}



