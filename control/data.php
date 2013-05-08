<?php
include_once ("control.php");

//******************************************add user**************************************************
addUser('xinliang', '123456');
addUser('herong', '123456');
addUser('weijian', '123456');
addUser('wenjie', '123456');
addUser('jiayi', '123456');
addUser('dinghui', '123456');
addUser('chenyu', '123456');
addUser('wanqi', '123456');
addUser('weiqi', '123456');
addUser('ruonan', '123456');
addUser('ganqian', '123456');
addUser('shanshan', '123456');

//******************************************login*****************************************************
$user1 =    login('xinliang', '123456') -> id;
$user2 =    login('herong', '123456') -> id;
$user3 =    login('weijian', '123456') -> id;
$user4 =    login('wenjie', '123456') -> id;
$user5 =    login('jiayi', '123456') -> id;
$user6 =    login('dinghui', '123456') -> id;
$user7 =    login('chenyu', '123456') -> id;
$user8 =    login('wanqi', '123456') -> id;
$user9 =    login('weiqi', '123456') -> id;
$user10 =   login('ruonan', '123456') -> id;
$user11 =   login('ganqian', '123456') -> id;
$user12 =   login('shanshan', '123456') -> id;

//********************************modifyItems********************************************************
modify('user', array('PicPath' => "u1739544-4.jpg", 'Info' => "a happy boy"), $user1);
modify('user', array('PicPath' => "u2117077-1.jpg"), $user3);
modify('user', array('PicPath' => "u1860328-24.jpg"), $user4);
modify('user', array('PicPath' => "u3865207-9.jpg"), $user5);
modify('user', array('PicPath' => "u21824670-4.jpg"), $user6);
modify('user', array('PicPath' => "u1254692-10.jpg"), $user7);


//*********************************************add friend*********************************************
addfriend($user1, $user2);
addfriend($user1, $user3);
addfriend($user1, $user4);
addfriend($user1, $user5);
addfriend($user1, $user6);
addfriend($user1, $user7);
addfriend($user2, $user1);
addfriend($user2, $user3);
addfriend($user2, $user6);
addfriend($user2, $user7);
addfriend($user2, $user8);
addfriend($user2, $user9);
addfriend($user3, $user1);
addfriend($user3, $user2);
addfriend($user3, $user5);
addfriend($user4, $user1);
addfriend($user4, $user2);
addfriend($user5, $user1);
addfriend($user5, $user6);
addfriend($user5, $user4);
addfriend($user6, $user2);
addfriend($user7, $user2);
addfriend($user8, $user2);
addfriend($user9, $user2);

//*******************************************add group************************************************
$ActivityId1 = addActivity('第一次聚会', '谁愿意的都可以参加，何荣结账', $user1, '2013-6-1', '18','21','贝岗');
$ActivityId2 = addActivity('第二次聚会', '电脑是我们的爱好，还是何荣结账', $user1,'2013-6-25', '19','23','天河城');
$ActivityId3 = addActivity('第一次聚会', '专注使我们走得更远，我不会坑何荣的，何荣自己说请的', $user3,'2013-6-3', '15','19','贝岗');
$ActivityId4 = addActivity('不记得是第几次聚会了', '我们关注的方向', $user2,'2013-6-30', '19','22','贝岗');

//******************************************add in group**********************************************
addInActivity($user2, $ActivityId1);
addInActivity($user3, $ActivityId1);
addInActivity($user5, $ActivityId1);
addInActivity($user6, $ActivityId1);
addInActivity($user7, $ActivityId1);
addInActivity($user3, $ActivityId2);
addInActivity($user4, $ActivityId2);
addInActivity($user1, $ActivityId2);
addInActivity($user4, $ActivityId3);
addInActivity($user8, $ActivityId3);
addInActivity($user5, $ActivityId3);
addInActivity($user1, $ActivityId3);
addInActivity($user9, $ActivityId3);
addInActivity($user10, $ActivityId4);
addInActivity($user11, $ActivityId4);
addInActivity($user12, $ActivityId4);

?>