<style>

div#questions
{
	margin: 0px 0px 0px 10%;
	width: 70%;
}
div#question
{
	margin: 60px 30px 0px 0px;
	width: 520px;
	float: left;
	border-bottom: 1px solid #cfcfcf;
	padding-bottom: 30px;
}
div#question div.edit_exitbtn
{
	width: 20px;
	height: 15px;
	float: right;
	color: #000;
	text-align: center;
	font: 18px "Trebuchet MS",sans-serif;
	background: url('http://localhost/codebuster/application/views/home/icons/post_edit-before hover.png');	
	background-size: 100% 100%;
	cursor: pointer;
}
div#question div.edit_exitbtn:hover
{
	background: url('http://localhost/codebuster/application/views/home/icons/post_edit-after hover.png');
	background-size: 100% 100%;
}
div#delete_editquestionbtn
{
	background: #fff;
	position: absolute;
	width: 200px;
	border-radius: 3px;
	color: #000;
	box-shadow: 0px 0px 1px darkblue;
	font: 14px "Trebuchet MS",sans-serif;
	display: none;
	z-index: 9;
}
div#delete_editquestionbtn li 
{
	padding: 0;
	display: block;
	cursor: pointer;
	margin-left: -40px;
	text-indent: 10px;
}
div#delete_editquestionbtn li:hover
{
	background: #cfcfcf;
	color: #000;
	margin-left: -40px;
}
textarea.editquestiontextarea
{
	width: 99%;
	height: 30px;
	resize: none;
	overflow: hidden;
	font: 14px "Trebuchet MS",sans-serif;
}
button.updatebtn
{
	background: RGBA(20,80,120,200);
	border-radius: 3px;
	border: none;
	float: right;
	margin-right: 5px;
	padding: 5px 8px;
	color: #fff;
	font: 14px "Trebuchet MS",sans-serif;
	font-weight: bold;
}
.questions_header
{
	font: 30px "Trebuchet MS", sans-serif;
}
div#img
{
	width: 60px;
	height: 60px;
	overflow: hidden;
	border: 1px solid #f9f9f9;
    border-radius:  50px;
	float: left;
	margin-top: 10px;
}
div#img img
{
    max-height:  80px;
    max-width:  80px;
    margin:  -5px;
}
span#question-title
{
	font: 20px "Trebuchet MS", sans-serif;
	color: navy;
	font-weight: bold;
	opacity: 0.8;
	border: 1px solid transparent;
	margin-left: 10px;
}
span.time
{
	color: #cfcfcf;
	font: 13px "trebuchet ms", sans-serif;
	margin-left: 20px;
}
div#question div.category
{
	font: 16px "Trebuchet MS",sans-serif;
	border: 1px solid transparent;
	margin-left: 70px;
	color: darkblue;
}
div#question-description
{
	font: 16px "Trebuchet MS", sans-serif;
	padding-bottom: 10px;
}
div.question-description
{
	margin-left: 15%;
	text-indent: -10px;
}
span.expand
{
	color: RGBA(30,20,300,100);
}
span.expand:hover
{
	cursor: pointer;
}
div.noofanswers
{
	width: 100%;
	color: RGBA(100,100,100,20);
	margin: 30px 40%;
	float: left;
}
div.noofanswers:hover
{
	cursor: pointer;
}
div.answers
{
	margin: 10px 5%;
}
div#answer
{
	color: #000;
	font: 14px "Trebuchet MS", sans-serif;
	margin-left: 5%;
	float: left;
	margin: 10px 0px 0px 10px;
	padding: 20px 0px 20px 0px;
}
div.answer-description
{
	margin: 2px 0px 0px 13%;
	text-indent: -10px;
	border: 1px solid transparent;
}
span.name
{
	color: RGBA(10,50,200,200);
	font-weight: bold;
}
div#answer p
{
	width: 560px;
}
div.nooflikes
{
	margin: -5px 5%;
	font: 15px "Trebuchet MS", sans-serif;
	float: left;
}
div.nooflikes img
{
	width: 15px;
	margin-top: 3px;
    cursor:  pointer;
}
div.answertextarea
{
	width: 100%;
	height: 50px;
	margin-top: 30px;
	background: #fff;
	border: 1px solid transparent;
	border-radius: 5px;
}
div.answertextarea div.imgcontainer
{
	width: 40px;
	height: 40px;
	float: left;
	margin: 3px;
	border: 1px solid transparent;
	overflow: hidden;
}
div.answertextarea img
{
	height: 40px;
}
div.answertextarea textarea
{
	width: 85%;
	height: 30px;
	resize: none;
	float: left;
	border: 1px solid #ccc;
	margin: 5px 5px;
	font: 14px  "Trebuchet MS", sans-serif;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
div.answertextarea textarea::-webkit-scrollbar 
{
    width: 10px;
    height: 10px;
}
div.answertextarea textarea::-webkit-scrollbar-track 
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
div.answertextarea textarea::-webkit-scrollbar-thumb 
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
button.browsebtn
{
	width: 25px;
	height: 25px;
	margin: 5px 60px;
	background-image: url('http://localhost/codebuster/application/views/home/icons/browse.png');
	background-size: 25px 25px;
	background-color: transparent;
	border: none;
	cursor: pointer;
}
div.filecontainer
{
	width: 40px;
	height: 40px;
	margin: -35px 100px;
	cursor: pointer;
}
button.answerbtn
{
	padding: 3px 10px 3px 10px;
    background: RGBA(20,80,120,200);
    border-radius: 3px;
	border: 1px solid transparent;
	display: inline;
	color: #fff;
	font: 15px "Trebuchet MS", sans-serif;
	float: right;
	margin: 5px 20px;
	font-weight: bold;
	cursor: pointer;
}
div.more-answer-btn
{
	margin-left: 50%;
}

.button-primary
{
	background: slategrey;
	border-radius: 3px;
	text-decoration: none;
	float: left;
	font: 18px "Trebuchet MS", sans-serif;
	color: #fff;
}
.medium
{
	padding: 5px 10px;
}
.button-primary:hover
{
	cursor: pointer;
	background: lightslategrey;
}
.loadingbar
{
    margin-left: 53%;
	float: left;
}
.loadingbar img
{
    width:  60px;
}
div#pagequestionnobtn
{
    margin-top: 10px;
    font: 22px "Trebuchet MS",sans-serif;
    color:  #000;
    float:  left;
    width:  520px;
    text-align: center;
    cursor: pointer;
}
div#pagequestionnobtn span
{
    margin-right: 3px;
}
span.currentpage
{
    color:  navy;
    text-decoration: underline;
}
div.topic-img
{
	width: 130%;
	margin: 10px auto;
}
div.topic-img div
{
	margin: auto;
	font: 16px "Trebuchet MS",sans-serif;
}
div.topic-img img
{
	max-width: 520px;
	cursor: pointer;
	margin-top: 30px;
    display: block;
}
div.noofimages
{
	margin: auto;
	text-indent: 50px;
}
div.next-prev
{
	float: left;
}
div.next-prev button
{
	padding: 2px 10px;
	background: #000;
	border: 1px solid #fff;
	border-radius: 2px;
	color: #fff;
	cursor: pointer;
}
button.prev
{
	background: #000;
	margin-top: -200px;
	border: 1px solid #f2f2f2;
}
div.sourcecode
{
	width: 520px;
	height: 320px;
	margin-top: 30px;	
	margin-bottom: 10px;
}
div.sourcecode .filename
{
	width: 520px;
	height: 20px;
	background: #000;
	color: #fff;
	text-indent: 5px;
	font: 14px "Trebuchet MS", sans-serif;
}
div.sourcecode .filename div.downloadlink
{
	float: right;
}
div.sourcecode .filename div.downloadlink a
{
	text-decoration: none;
	margin-right: 10px;
	color: blue;
}
div.codecontainer
{
	width: 520px;
	height: 100%;
	overflow-x: scroll;
	background: #f2f2f2;
}
div.codecontainer div.code
{
	width: 3000px;
}
div.codecontainer::-webkit-scrollbar 
{
    width: 10px;
    height: 10px;
}
div.codecontainer::-webkit-scrollbar-track 
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
div.codecontainer::-webkit-scrollbar-thumb 
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
</style>
<div id="questions" style="height: 9194px;">
        <div class="questions_header" id="questionslists">Newest Questions</div>
        <div id="questions_lists"><div id="question"><div class="edit_exitbtn"></div><div id="img"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif" style="height: 70px;"></div><div id="question-description"><span class="name">Glenson Rosos<span class="time">147 days ago via codebuster</span></span><p><span id="question-title">kjsdkja s</span></p><div class="category"> Category - C#</div><div class="question-description">asd kjsa dk</div></div><div class="topic-img"><div class="image-container"><img src="http://localhost/codebuster/application/views/uploads/ed519c02f134f2cdd8.jpg"></div><div class="noofimages">1 image(s)<div class="next-prev"><button class="prevbtn">&lt;</button><button class="nextbtn">&gt;</button></div></div></div><div class="answertextarea"><div class="imgcontainer"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif"></div><textarea placeholder="Please Login to be able to answer this question..."></textarea></div><div class="answers"><div class="noofanswers">no answer</div></div><div class="more-answer-btn" onclick="return false"></div></div><div id="question"><div class="edit_exitbtn"></div><div id="img"><img src="http://graph.facebook.com/884017801619465/picture?width=300&amp;height=300"></div><div id="question-description"><span class="name">John Mart Belamide<span class="time">149 days ago via facebook</span></span><p><span id="question-title">LAYOUT</span></p><div class="category"> Category - PHP</div><div class="question-description">Sample Layout</div></div><div class="topic-img"><div class="image-container"><img src="http://localhost/codebuster/application/views/uploads/63a8f9e307f0bf4473.png"></div><div class="noofimages">1 image(s)<div class="next-prev"><button class="prevbtn">&lt;</button><button class="nextbtn">&gt;</button></div></div></div><div class="answertextarea"><div class="imgcontainer"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif"></div><textarea placeholder="Please Login to be able to answer this question..."></textarea></div><div class="answers"><div class="noofanswers">no answer</div></div><div class="more-answer-btn" onclick="return false"></div></div><div id="question"><div class="edit_exitbtn"></div><div id="img"><img src="https://lh4.googleusercontent.com/-o7rUXtyNBVg/AAAAAAAAAAI/AAAAAAAAACg/ss_x7Nx3p8o/photo.jpg?sz=100"></div><div id="question-description"><span class="name">John Mart Belamide<span class="time">152 days ago via gmail</span></span><p><span id="question-title">ksadl ksak d</span></p><div class="category"> Category - PHP</div><div class="question-description">my sample web layout</div></div><div class="topic-img"><div class="image-container"><img src="http://localhost/codebuster/application/views/uploads/773fc3013fec43c958.jpg"></div><div class="noofimages">4 image(s)<div class="next-prev"><button class="prevbtn">&lt;</button><button class="nextbtn">&gt;</button></div></div></div><div class="answertextarea"><div class="imgcontainer"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif"></div><textarea placeholder="Please Login to be able to answer this question..."></textarea></div><div class="answers"><div class="noofanswers">no answer</div></div><div class="more-answer-btn" onclick="return false"></div></div><div id="question"><div class="edit_exitbtn"></div><div id="img"><img src="http://graph.facebook.com/884017801619465/picture?width=300&amp;height=300"></div><div id="question-description"><span class="name">John Mart Belamide<span class="time">152 days ago via facebook</span></span><p><span id="question-title">DATABASE</span></p><div class="category"> Category - PHP</div><div class="question-description">Workshop Database</div></div><div class="sourcecode"><div class="filename">workshop_management.sql<div class="downloadlink"><a href="http://localhost/codebuster/index.php/posts_questions/downloadFile/6da34b3a75a27bbe3b.sql">Download Me!</a></div></div><div class="codecontainer" contenteditable="true">

-- phpMyAdmin SQL Dump
<br>-- version 4.2.7.1
<br>-- http://www.phpmyadmin.net
<br>--
<br>-- Host: 127.0.0.1
<br>-- Generation Time: Feb 26, 2015 at 02:13 PM
<br>-- Server version: 5.6.20
<br>-- PHP Version: 5.5.15
<br>
<br>SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
<br>SET time_zone = "+00:00";
<br>
<br>
<br>/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
<br>/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
<br>/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
<br>/*!40101 SET NAMES utf8 */;
<br>
<br>--
<br>-- Database: `workshop_management`
<br>--
<br>
<br>DELIMITER $$
<br>--
<br>-- Procedures
<br>--
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `add_appointment`(IN `_idnumber` VARCHAR(300), IN `_appointment_date` VARCHAR(300), IN `_appointment_time` VARCHAR(300), IN `_name` VARCHAR(300), IN `_car` VARCHAR(300), IN `_license_plate_no` VARCHAR(300), IN `_stock_no` VARCHAR(300), IN `_service_required` VARCHAR(300))
<br>    NO SQL
<br>Insert into `appointments` (`id_number`,`appointment_date`,`appointment_time`,`name`,`car`,`license_plate_no`,`stock_no`,`service_required`)
<br>values(_idnumber,_appointment_date,_appointment_time,_name,_car,_license_plate_no,_stock_no,_service_required)$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `add_customer_update`(IN `_appointment_no` INT(255), IN `_license_plate_no` VARCHAR(300), IN `_ro_no` VARCHAR(300), IN `_date` VARCHAR(300), IN `_time` VARCHAR(300), IN `_contact` VARCHAR(300), IN `_feedback` VARCHAR(300), IN `_other` VARCHAR(300))
<br>    NO SQL
<br>Insert into `customer_updates` (`appointment_no`,`license_plate_no`,`ro_no`,`date`,`time`,`contact`,`feedback`,`other`)
<br>values(_appointment_no,_license_plate_no,_ro_no,_date,_time,_contact,_feedback,_other)$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `add_update`(IN `_appointmentno` INT(255), IN `_status` VARCHAR(300), IN `_user` INT(255), IN `_date` VARCHAR(300), IN `_time` VARCHAR(300))
<br>    NO SQL
<br>Insert into `status_updates` (`appointmentno`,`status`,`user`,`date`,`time`)
<br>values(_appointmentno,_status,_user,_date,_time)$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `add_user`(IN `p_username` VARCHAR(300), IN `p_password` VARCHAR(300), IN `p_firstname` VARCHAR(300), IN `p_lastname` VARCHAR(300))
<br>    NO SQL
<br>Insert into `users` (`username`,`password`,`firstname`,`lastname`)
<br>values(p_username,p_password,p_firstname,p_lastname)$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `authenticate`(IN `p_username` VARCHAR(300), IN `p_password` VARCHAR(300))
<br>    NO SQL
<br>Select * from `users` where `username`=p_username and `password`=p_password$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `change_password`(IN `_id` INT(255), IN `_password` VARCHAR(300))
<br>    NO SQL
<br>Update `users` set `password`=_password where `id`=_id$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `check_password`(IN `_id` INT(255), IN `_password` VARCHAR(300))
<br>    NO SQL
<br>Select * from `users` where `password`=_password and `id`=_id$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `count_appointments`(IN `_license_plate_no` VARCHAR(300))
<br>    NO SQL
<br>select count(*) as `appointments` from `appointments` where `license_plate_no` LIKE concat('%',_license_plate_no,'%')$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `count_customer_updates`(IN `_license` VARCHAR(300))
<br>    NO SQL
<br>Select count(*) as `count` from `customer_updates` where `license_plate_no` LIKE concat('%',_license,'%')$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `count_search_history`(IN `date` VARCHAR(300))
<br>    NO SQL
<br>select count(*) as `count` from `appointments` join `status_updates` on `appointments`.`appointmentno`=`status_updates`.`appointmentno` join `users` on `status_updates`.`user`=`users`.`id` where `appointment_datetime` LIKE concat(_date,'%')$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `count_status_lists`(IN `_license` VARCHAR(300))
<br>    NO SQL
<br>select count(*) as `count` from `appointments` join `status_updates` on `appointments`.`appointmentno`=`status_updates`.`appointmentno` join `users` on `status_updates`.`user`=`users`.`id` where `status_updates`.`update_no`=(select max(`update_no`) from `status_updates` where `appointmentno`=`appointments`.`appointmentno`) and `license_plate_no` LIKE concat('%',_license,'%')$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `count_update_history`(IN `_license_plate_no` VARCHAR(300))
<br>    NO SQL
<br>select count(*) as `count` from `appointments` join `status_updates` on `appointments`.`appointmentno`=`status_updates`.`appointmentno` join `users` on `status_updates`.`user`=`users`.`id` where `appointments`.`license_plate_no` LIKE concat('%',_license_plate_no,'%')$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `count_welcome_board`(IN `_license` VARCHAR(300), IN `_date` VARCHAR(300))
<br>    NO SQL
<br>Select count(*) as `appointments`,(Select count(*) from `status_updates` join `appointments` on `status_updates`.`appointmentno`=`appointments`.`appointmentno` where 
<br>`appointments`.`appointment_date` = _date and ((`appointments`.`license_plate_no` LIKE concat('%',_license,'%') or `stock_no` LIKE concat('%',_license,'%')))) as `updates` 
<br>from `appointments` where `appointment_date` = _date and ((`license_plate_no` LIKE concat('%',_license,'%') or `stock_no` LIKE concat('%',_license,'%')))$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_appointments`(IN `_from` INT(255), IN `_entries` INT(255), IN `_license` VARCHAR(300))
<br>    NO SQL
<br>Select * from `appointments` where `license_plate_no` LIKE concat('%',_license,'%') order by `appointmentno` asc limit _from,_entries$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_customer_updates`(IN `_from` INT(255), IN `_entries` INT(255), IN `_license_plate_no` VARCHAR(300))
<br>    NO SQL
<br>Select * from `customer_updates` where `license_plate_no` LIKE concat('%',_license_plate_no,'%') limit _from,_entries$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_latest_appointmentno`()
<br>    NO SQL
<br>select cast(case when count(*) &gt; 0 then max(`appointmentno`) + 1 else 1 end as unsigned) as `appointmentno`,count(*) from `appointments`$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_latest_customer_update_id`()
<br>    NO SQL
<br>select cast(case when count(*) &gt; 0 then max(`update_id`) + 1 else 1 end as unsigned) as `update_id`,count(*) from `customer_updates`$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_latest_update_no`()
<br>    NO SQL
<br>select cast(case when count(*) &gt; 0 then max(`update_no`) + 1 else 1 end as unsigned) as `update_no`,count(*) from `status_updates`$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_status_lists`(IN `_license` VARCHAR(300), IN `_from` INT(255), IN `_entries` INT(255))
<br>    NO SQL
<br>select `appointments`.`license_plate_no`,`appointments`.`ro_no`,`status_updates`.`status`,`status_updates`.`date`,`status_updates`.`time`,concat(`users`.`firstname`,' ',`users`.`lastname`) as `user`,`appointments`.`location`,`appointments`.`service_advisor`,`appointments`.`technician`,`appointments`.`promise_date`,`appointments`.`promise_time` from `appointments` join `status_updates` on `appointments`.`appointmentno`=`status_updates`.`appointmentno` join `users` on `status_updates`.`user`=`users`.`id` where `status_updates`.`update_no`=(select max(`update_no`) from `status_updates` where `appointmentno`=`appointments`.`appointmentno`) and `appointments`.`license_plate_no` LIKE concat('%',_license,'%') order by `status_updates`.`update_no` desc limit _from,_entries$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_status_update_history`(IN `_from` INT(255), IN `_entries` INT(255), IN `_license_plate_no` VARCHAR(300))
<br>    NO SQL
<br>select `appointments`.`license_plate_no`,`appointments`.`stock_no`,`appointments`.`ro_no`,`status_updates`.`status`,`status_updates`.`date`,`status_updates`.`time`,concat(`users`.`firstname`,' ',`users`.`lastname`) as `user`,`appointments`.`location`,`appointments`.`service_advisor`,`appointments`.`technician`,`appointments`.`received_date`,`appointments`.`received_time`,`appointments`.`ro_date`,`appointments`.`ro_time`,`appointments`.`promise_date`,`appointments`.`promise_time`,`release_date`,`appointments`.`release_time` from `appointments` join `status_updates` on `appointments`.`appointmentno`=`status_updates`.`appointmentno` join `users` on `status_updates`.`user`=`users`.`id` where `license_plate_no` LIKE concat('%',_license_plate_no,'%') order by `status_updates`.`update_no` desc limit _from,_entries$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_users`(IN `_from` INT(255), IN `_entries` INT(255))
<br>    NO SQL
<br>Select * from `users` limit _from,_entries$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `get_welcome_boards`(IN `_license` VARCHAR(300), IN `_date` VARCHAR(300), IN `_from` INT, IN `_entries` INT)
<br>    NO SQL
<br>Select (Select `time` from `status_updates` where `update_no` = (Select max(`update_no`) from `status_updates` where `appointmentno`=`appointments`.`appointmentno`) and `appointmentno`=`appointments`.`appointmentno`) as `time`,`name`,`license_plate_no`,`stock_no`,`vehicle_status` from `appointments` where (`license_plate_no` LIKE concat('%',_license,'%') or `stock_no` LIKE concat('%',_license,'%')) and `appointment_date` = _date order by `appointmentno` asc limit _from,_entries$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `is_appointment_conflict`(IN `_license_plate_no` VARCHAR(300), IN `_date` VARCHAR(300))
<br>    NO SQL
<br>Select * from `appointments` where `license_plate_no`=_license_plate_no and `appointment_date`=_date$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `is_username_exists`(IN `_username` VARCHAR(300))
<br>    NO SQL
<br>Select * from `users` where `username`=_username$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `search_status_update_history`(IN `_from` INT(255), IN `_entries` INT(255), IN `_license_plate_no` VARCHAR(300))
<br>    NO SQL
<br>select `appointments`.`license_plate_no`,`appointments`.`ro_no`,`status_updates`.`status`,`status_updates`.`time`,concat(`users`.`firstname`,' ',`users`.`lastname`) as `user`,`appointments`.`location`,`appointments`.`service_advisor`,`appointments`.`technician`,`appointments`.`received_date`,`appointments`.`received_time`,`appointments`.`ro_date`,`appointments`.`ro_time`,`appointments`.`promise_date`,`appointments`.`promise_time`,`release_date`,`appointments`.`release_time` from `appointments` join `status_updates` on `appointments`.`appointmentno`=`status_updates`.`appointmentno` join `users` on `status_updates`.`user`=`users`.`id` where `appointments`.`license_plate_no` LIKE concat('%',_license_plate_no,'%')  order by `status_updates`.`update_no` desc limit _from,_entries$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_sample`(IN `_username` VARCHAR(300))
<br>    NO SQL
<br>Select * from `users` where username=_username$$
<br>
<br>CREATE DEFINER=`root`@`localhost` PROCEDURE `update_appointment`(IN `_appointmentno` INT(255), IN `_ro_no` VARCHAR(300), IN `_received_date` VARCHAR(300), IN `_received_time` VARCHAR(300), IN `_service_advisor` VARCHAR(300), IN `_technician` VARCHAR(300), IN `_ro_date` VARCHAR(300), IN `_ro_time` VARCHAR(300), IN `_vehicle_status` VARCHAR(300), IN `_location` VARCHAR(300), IN `_promise_date` VARCHAR(300), IN `_promise_time` VARCHAR(300), IN `_release_date` VARCHAR(300), IN `_release_time` VARCHAR(300), IN `_comment` VARCHAR(300))
<br>    NO SQL
<br>update `appointments` set `ro_no`=_ro_no,`received_date`=_received_date,`received_time`=_received_time,`service_advisor`=_service_advisor,`technician`=_technician,`ro_date`=_ro_date,`ro_time`=_ro_time,`vehicle_status`=_vehicle_status,`location`=_location,`promise_date`=_promise_date,`promise_time`=_promise_time,`release_date`=_release_date,`release_time`=_release_time,`comment`=_comment where `appointmentno`=_appointmentno$$
<br>
<br>DELIMITER ;
<br>
<br>-- --------------------------------------------------------
<br>
<br>--
<br>-- Table structure for table `appointments`
<br>--
<br>
<br>CREATE TABLE IF NOT EXISTS `appointments` (
<br>`appointmentno` int(255) NOT NULL,
<br>  `id_number` varchar(300) NOT NULL,
<br>  `appointment_date` varchar(300) NOT NULL,
<br>  `appointment_time` varchar(300) NOT NULL,
<br>  `name` varchar(300) NOT NULL,
<br>  `business` varchar(300) NOT NULL,
<br>  `contact` varchar(300) NOT NULL,
<br>  `car` varchar(300) NOT NULL,
<br>  `license_plate_no` varchar(300) NOT NULL,
<br>  `stock_no` varchar(300) NOT NULL,
<br>  `service_required` varchar(300) NOT NULL,
<br>  `ro_date` varchar(300) NOT NULL,
<br>  `ro_time` varchar(300) NOT NULL,
<br>  `ro_no` varchar(300) NOT NULL,
<br>  `service_advisor` varchar(300) NOT NULL,
<br>  `technician` varchar(300) NOT NULL,
<br>  `received_date` varchar(300) NOT NULL,
<br>  `received_time` varchar(300) NOT NULL,
<br>  `vehicle_status` varchar(300) NOT NULL,
<br>  `location` varchar(300) NOT NULL,
<br>  `promise_date` varchar(300) NOT NULL,
<br>  `promise_time` varchar(300) NOT NULL,
<br>  `release_date` varchar(300) NOT NULL,
<br>  `release_time` varchar(300) NOT NULL,
<br>  `comment` varchar(999) NOT NULL
<br>) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;
<br>
<br>--
<br>-- Dumping data for table `appointments`
<br>--
<br>
<br>INSERT INTO `appointments` (`appointmentno`, `id_number`, `appointment_date`, `appointment_time`, `name`, `business`, `contact`, `car`, `license_plate_no`, `stock_no`, `service_required`, `ro_date`, `ro_time`, `ro_no`, `service_advisor`, `technician`, `received_date`, `received_time`, `vehicle_status`, `location`, `promise_date`, `promise_time`, `release_date`, `release_time`, `comment`) VALUES
<br>(1, '25407', '02/26/2015', '07:45am', 'LIBRADILLA, CHARM FLORIANNE C.', '', '', '2015 RANGER DOUBLE Hi RIDER WILDTRAK 4X4 AT 3.2L', '', 'IH9970', 'ACCESSORIES', '02/26/2015', '10:15 PM', 'PK #111', 'Randolf Diniay', 'Glenson Rosos', '02/26/2015', '10:15 PM', 'INVOICED (IN)', 'Reception', '02/26/2015', '08:55 AM', '02/26/2015', '', 'nice'),
<br>(2, '24831', '02/26/2015', '08:00am', 'ROSAL, GINA E.', '', '', '2014 FORD RANGER DOUBLE Hi RIDER 4X2 XLT MT', 'IF6039', 'IF6039', '20,000K SERVICE', '02/26/2015', '4:30 PM', 'RO #11', '', '', '02/26/2015', '4:30 PM', 'NOT ASSIGNED (NA)', '', '02/26/2015', '2:22 PM', '02/26/2015', '', ''),
<br>(3, '23793', '02/26/2015', '08:00am', 'RAGANAS, DANILO S.', '', '', '2013 FORD RANGER DOUBLE Hi RIDER 4X2 XLT MT', 'UNREG', 'IE9532', '30,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(4, '31784', '02/26/2015', '08:00am', 'PAGASPAS, NORBERT B', '', '', '2014 EVEREST 4X2 AT Ltd ICA II', 'UNREG', 'IH3043', 'WHEEL ALIGNMENT', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(5, '21384', '02/26/2015', '08:15am', 'CUYNO, RADIN P', '', '', '2012 FIESTA C6 (1.6L SIGMA) DPS6 4NB MID AT', 'YLA996', 'ID9453', 'ENGINE &amp; TUNE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(6, '18086', '02/26/2015', '08:30am', 'YBAÑEZ, FRANCISCO L', '', '', 'FORD FIESTA C6 (1.6L SIGMA) DPS6 4NB MID AT', 'YKE925', 'IC5034', 'ENGINE GENERAL', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(7, '10791', '02/26/2015', '08:45am', 'SENIEDO, ELIZABETH', '', '', 'ESCAPE 2.3L 4X2 XLS A/T', 'YCC924', 'JB1768', '40,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(8, '22779', '02/26/2015', '08:45am', 'CANETE, LOVELLA / ERNESTO T', '', '', 'FORD FIESTA C4 (1.4L SIGMA) 4DR MID AT ', 'IE4074', 'IE4074', '30,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(9, '23045', '02/26/2015', '09:00am', 'FARLEY, ROSALIE C', '', '', '2013 FORD EXPLORER 4Dr 4WD LIMITED 3.5L V6', 'SCF13', 'IE3687', '30,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(10, '24017', '02/26/2015', '09:00am', 'BAUTISTA, RAYMUNDO BALTAZAR T.', '', '', '2013 RANGER DOUBLE Hi RIDER WILDTRAK 4X4 MT 2.2L', 'UNREG', 'IE9914', '30,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(11, '29707', '02/26/2015', '09:15am', 'CEBU SEA CHARTERERS INC.', '', '', '2014 RANGER DOUBLE Hi RIDER WILDTRAK 4X4 AT 3.2L', 'UNREG', 'IH3282', '10,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(12, '22225', '02/26/2015', '09:15am', 'RUIZ, MARIA RUTH QUITORIO', '', '', 'FORD EVEREST 4X2 AT LTD', 'VFT139', 'IE4545', '25,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(13, '19977', '02/26/2015', '09:30am', 'ACAPULCO, EMELDA P', '', '', '2012 FORD EVEREST 4X2 AT LTD BUZZ', 'YKM951', 'ID4950', 'GENERAL DIAGNOSIS', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(14, '30627', '02/26/2015', '09:30am', 'LAID, ABRAHAM BILL M', '', '', '2015 FORD RANGER DOUBLE Hi RIDER 4X4 XL MT', 'UNREG', 'IH4282', '10,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(15, '14250', '02/26/2015', '09:45am', 'ZANORIA, EMMANUEL B.', '', '', '2008 FORD EVEREST 4X2 AT', 'YHF878', 'IB5664', '60,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(16, '20064', '02/26/2015', '09:45am', 'LUBAS, ERNESTO A.', '', '', 'EVEREST 4X2 MT', 'ZDT569', 'IA6156', 'GENERAL DIAGNOSIS', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(17, '31646', '02/26/2015', '10:00am', 'WOOD, DAVID RONALD', '', '', '2014 FIESTA 1.5L SPORT 5Dr AT ', 'UNREG', 'IG7082', '1,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(18, '28684', '02/26/2015', '10:00am', 'TEMPLE, SHERYL BRAVANTE', '', '', 'FORD FIESTA C4 (1.4L SIGMA) 4DR MID AT ', 'LHG530', 'LHG530', '20,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(19, '11569', '02/26/2015', '10:00am', 'DY, FRANCIS L.', '', '', '2014 RANGER DOUBLE Hi RIDER WILDTRAK 4X4 AT 3.2L', 'UNREG', 'IF8729', '20,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(20, '28586', '02/26/2015', '10:15am', 'LU, RUBIN M.', '', '', '2014 FORD ECOSPORT 5Dr TREND 1.5L MT', 'UNREG', 'IG6951', 'GENERAL DIAGNOSIS', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(21, '17958', '02/26/2015', '10:45am', 'CAPACITE, ARNULFO S.', '', '', 'FORD FIESTA C4 (1.4L SIGMA) IB5 4NB MID ', 'YKA234', 'IC6443', '60,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(22, '15512', '02/26/2015', '10:45am', 'BACUS, CATHERINE ANN A.', '', '', '2010 FORD EVEREST 4X2 MT', 'YGX863', 'IB9779', '50,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(23, '22190', '02/26/2015', '11:00am', 'OUANO, VIRGILIO M', '', '', 'FORD RANGER DOUBLE Hi RIDER 4X2 XLT AT', 'YLP532', 'IE7686', '40,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(24, '29171', '02/26/2015', '01:00pm', 'PASQUIER, STEPHANE J.', '', '', '2014 EXPLORER 3.5L Limited+', 'UNREG', 'IF8510', '10,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(25, '29704', '02/26/2015', '01:00pm', 'MATSYA SHIPPING LINES CORP.', '', '', '2014 FORD RANGER DOUBLE Hi RIDER 4X2 XLT AT', 'UNREG', 'IH1577', '10,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(26, '31553', '02/26/2015', '01:00pm', 'CEJAS, NESTOR J.', '', '', '2015 FORD ECOSPORT 5Dr TREND 1.5L AT', '', 'II0259', '1,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(27, '31607', '02/26/2015', '01:15pm', 'CHU, ALBERT L.', '', '', '2015 FORD ECOSPORT 5Dr TITANIUM 1.5L AT', 'UNREG', 'IH9031', '1,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(28, '31203', '02/26/2015', '01:15pm', 'RAFTER, JANETTE P.', '', '', '2015 RANGER DOUBLE Hi RIDER WILDTRAK 4X2 AT 2.2L', '', 'IH9810', '1,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(29, '8211', '02/26/2015', '01:30pm', 'YAP, ANTONIO S', '', '', '2015 RANGER DOUBLE Hi RIDER WILDTRAK 4X4 AT 3.2L', 'UNREG', 'IH9406', '1,000K SERVICE', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(31, '1234', '02/26/2015', '1:00 PM', 'Randolf Diniay', '', '', '2010 Expolorer', 'IFS2042', '', 'BP repair', '02/26/2015', '2:00 PM', 'PK #20', 'Carl John Don Sebial', 'Tesaluna Loading', '02/26/2015', '2:00 PM', 'FOR RELEASE (FR)', 'Reception', '02/26/2015', '4:09 PM', '02/26/2015', '2:09 PM', ''),
<br>(61, '23232', '02/26/2015', '1:00 PM', 'Hello Variable', '', '', '2010 Error', 'KSA349', '', 'Ayo og suga', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(62, '12124', '02/26/2015', '1:00 PM', 'Calling Data Type', '', '', '2010 Undefined', 'IFF232', '', 'Debug', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
<br>(63, '283723', '02/27/2015', '1:00 PM', 'Master Programmer', '', '', '2008 Focus', 'IFD235', '', 'Ayo og ligid', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
<br>
<br>-- --------------------------------------------------------
<br>
<br>--
<br>-- Table structure for table `customer_updates`
<br>--
<br>
<br>CREATE TABLE IF NOT EXISTS `customer_updates` (
<br>`update_id` int(255) NOT NULL,
<br>  `appointment_no` int(255) NOT NULL,
<br>  `license_plate_no` varchar(300) NOT NULL,
<br>  `ro_no` varchar(300) NOT NULL,
<br>  `date` varchar(300) NOT NULL,
<br>  `time` varchar(300) NOT NULL,
<br>  `contact` varchar(300) NOT NULL,
<br>  `feedback` varchar(300) NOT NULL,
<br>  `other` varchar(300) NOT NULL
<br>) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
<br>
<br>-- --------------------------------------------------------
<br>
<br>--
<br>-- Table structure for table `status`
<br>--
<br>
<br>CREATE TABLE IF NOT EXISTS `status` (
<br>  `code` varchar(300) NOT NULL,
<br>  `description` varchar(300) NOT NULL
<br>) ENGINE=InnoDB DEFAULT CHARSET=latin1;
<br>
<br>--
<br>-- Dumping data for table `status`
<br>--
<br>
<br>INSERT INTO `status` (`code`, `description`) VALUES
<br>('CW', 'For car wash'),
<br>('FR', 'For release'),
<br>('HC', 'Hold customer'),
<br>('IN', 'Invoiced'),
<br>('NA', 'Not assign'),
<br>('OG', 'On going'),
<br>('OS', 'Out for sublet'),
<br>('QC', 'Quality check'),
<br>('RT', 'Road test'),
<br>('WI', 'Waiting for insurance'),
<br>('WP', 'Waiting parts');
<br>
<br>-- --------------------------------------------------------
<br>
<br>--
<br>-- Table structure for table `status_updates`
<br>--
<br>
<br>CREATE TABLE IF NOT EXISTS `status_updates` (
<br>`update_no` int(255) NOT NULL,
<br>  `appointmentno` int(255) NOT NULL,
<br>  `status` varchar(300) NOT NULL,
<br>  `user` int(255) NOT NULL,
<br>  `date` varchar(300) NOT NULL,
<br>  `time` varchar(300) NOT NULL
<br>) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
<br>
<br>--
<br>-- Dumping data for table `status_updates`
<br>--
<br>
<br>INSERT INTO `status_updates` (`update_no`, `appointmentno`, `status`, `user`, `date`, `time`) VALUES
<br>(1, 1, 'NOT ASSIGNED (NA)', 1, '02/26/2015', '12:58 AM'),
<br>(2, 1, 'ON GOING (OG)', 1, '02/26/2015', '01:06 AM'),
<br>(3, 1, 'FOR RELEASE (FR)', 1, '02/26/2015', '06:55 AM'),
<br>(4, 1, 'INVOICED (IN)', 1, '02/26/2015', '06:55 AM'),
<br>(5, 31, 'NOT ASSIGNED (NA)', 1, '02/26/2015', '07:57 AM'),
<br>(6, 2, 'NOT ASSIGNED (NA)', 1, '02/26/2015', '12:22 PM'),
<br>(7, 31, 'ON GOING (OG)', 1, '02/26/2015', '12:57 PM'),
<br>(8, 31, 'WAITING PARTS (WP)', 1, '02/26/2015', '12:59 PM'),
<br>(9, 31, 'FOR RELEASE (FR)', 1, '02/26/2015', '2:09 PM');
<br>
<br>-- --------------------------------------------------------
<br>
<br>--
<br>-- Table structure for table `users`
<br>--
<br>
<br>CREATE TABLE IF NOT EXISTS `users` (
<br>`id` int(11) NOT NULL,
<br>  `username` varchar(300) NOT NULL,
<br>  `password` varchar(300) NOT NULL,
<br>  `firstname` varchar(300) NOT NULL,
<br>  `lastname` varchar(300) NOT NULL
<br>) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;
<br>
<br>--
<br>-- Dumping data for table `users`
<br>--
<br>
<br>INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
<br>(1, 'belamide09', 'a277474f554bda2cf6054c6a2940183d', 'John Mart', 'Belamide'),
<br>(5, 'glenson', 'fe8b772b1105345b3aed648b0499343d', 'Glenson', 'Rosos'),
<br>(6, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');
<br>
<br>--
<br>-- Indexes for dumped tables
<br>--
<br>
<br>--
<br>-- Indexes for table `appointments`
<br>--
<br>ALTER TABLE `appointments`
<br> ADD PRIMARY KEY (`appointmentno`);
<br>
<br>--
<br>-- Indexes for table `customer_updates`
<br>--
<br>ALTER TABLE `customer_updates`
<br> ADD PRIMARY KEY (`update_id`);
<br>
<br>--
<br>-- Indexes for table `status`
<br>--
<br>ALTER TABLE `status`
<br> ADD PRIMARY KEY (`code`);
<br>
<br>--
<br>-- Indexes for table `status_updates`
<br>--
<br>ALTER TABLE `status_updates`
<br> ADD PRIMARY KEY (`update_no`);
<br>
<br>--
<br>-- Indexes for table `users`
<br>--
<br>ALTER TABLE `users`
<br> ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);
<br>
<br>--
<br>-- AUTO_INCREMENT for dumped tables
<br>--
<br>
<br>--
<br>-- AUTO_INCREMENT for table `appointments`
<br>--
<br>ALTER TABLE `appointments`
<br>MODIFY `appointmentno` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
<br>--
<br>-- AUTO_INCREMENT for table `customer_updates`
<br>--
<br>ALTER TABLE `customer_updates`
<br>MODIFY `update_id` int(255) NOT NULL AUTO_INCREMENT;
<br>--
<br>-- AUTO_INCREMENT for table `status_updates`
<br>--
<br>ALTER TABLE `status_updates`
<br>MODIFY `update_no` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
<br>--
<br>-- AUTO_INCREMENT for table `users`
<br>--
<br>ALTER TABLE `users`
<br>MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
<br>/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
<br>/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
<br>/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
<br></div></div><div class="answertextarea"><div class="imgcontainer"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif"></div><textarea placeholder="Please Login to be able to answer this question..."></textarea></div><div class="answers"><div class="noofanswers">2 answers</div><div id="answer"><div id="img"><img src="https://lh4.googleusercontent.com/-o7rUXtyNBVg/AAAAAAAAAAI/AAAAAAAAACg/ss_x7Nx3p8o/photo.jpg?sz=100"></div><div class="answer-description"><p><span class="name">John Mart Belamide</span><span> lkdslf kdslf lsdkl fksdl kf</span></p><div class="nooflikes"><img src="http://localhost/codebuster/application/views/home/icons/like-btn.png" class="like-btn"><span> 1 like</span><span class="time">152 days ago via gmail</span></div></div></div><div id="answer"><div id="img"><img src="http://graph.facebook.com/884017801619465/picture?width=300&amp;height=300"></div><div class="answer-description"><p><span class="name">John Mart Belamide</span><span> asdsadkad kjsakjd </span></p><div class="nooflikes"><img src="http://localhost/codebuster/application/views/home/icons/like-btn.png" class="like-btn"><span> 2 likes</span><span class="time">152 days ago via facebook</span></div></div></div></div><div class="more-answer-btn" onclick="return false"></div></div><div id="question"><div class="edit_exitbtn"></div><div id="img"><img src="http://graph.facebook.com/884017801619465/picture?width=300&amp;height=300"></div><div id="question-description"><span class="name">John Mart Belamide<span class="time">157 days ago via facebook</span></span><p><span id="question-title">WEBSITE TEMPLATE</span></p><div class="category"> Category - PHP</div><div class="question-description">Awesome website template :)</div></div><div class="topic-img"><div class="image-container"><img src="http://localhost/codebuster/application/views/uploads/191391488d9d0584e5.jpg"></div><div class="noofimages">1 image(s)<div class="next-prev"><button class="prevbtn">&lt;</button><button class="nextbtn">&gt;</button></div></div></div><div class="answertextarea"><div class="imgcontainer"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif"></div><textarea placeholder="Please Login to be able to answer this question..."></textarea></div><div class="answers"><div class="noofanswers">no answer</div></div><div class="more-answer-btn" onclick="return false"></div></div><div id="question"><div class="edit_exitbtn"></div><div id="img"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif" style="height: 70px;"></div><div id="question-description"><span class="name">Glenson Rosos<span class="time">157 days ago via codebuster</span></span><p><span id="question-title">PHP INIT</span></p><div class="category"> Category - PHP</div><div class="question-description">It's very difficult to understand.</div></div><div class="sourcecode"><div class="filename">init.php<div class="downloadlink"><a href="http://localhost/codebuster/index.php/posts_questions/downloadFile/162c9557a309ce6841.php">Download Me!</a></div></div><div class="codecontainer" contenteditable="true">


<br>&lt;?php
<br>
<br>require_once 'core/Setup.php';
<br>require_once 'core/security.php';
<br>require_once 'core/connection.php';
<br>require_once 'core/App.php';
<br>require_once 'core/Controller.php';
<br>require_once 'core/load.php';
<br>require_once 'core/built-in.php';
<br>require_once 'core/Model.php';
<br>require_once 'core/query_results.php';
<br>require_once 'core/sessions.php';
<br>require_once 'core/uploader.php';
<br>require_once 'core/pagination.php';
<br></div></div><div class="answertextarea"><div class="imgcontainer"><img src="http://localhost/codebuster/application/views/home/icons/nopicturemale.gif"></div><textarea placeholder="Please Login to be able to answer this question..."></textarea></div><div class="answers"><div class="noofanswers">2 answers</div><div id="answer"><div id="img"><img src="https://lh4.googleusercontent.com/-o7rUXtyNBVg/AAAAAAAAAAI/AAAAAAAAACg/ss_x7Nx3p8o/photo.jpg?sz=100"></div><div class="answer-description"><p><span class="name">John Mart Belamide</span><span> me to..

:)</span></p><div class="nooflikes"><img src="http://localhost/codebuster/application/views/home/icons/like-btn.png" class="like-btn"><span> &nbsp; like</span><span class="time">157 days ago via gmail</span></div></div></div><div id="answer"><div id="img"><img src="http://graph.facebook.com/884017801619465/picture?width=300&amp;height=300"></div><div class="answer-description"><p><span class="name">John Mart Belamide</span><span> Yey. I notice that too brother.</span></p><div class="nooflikes"><img src="http://localhost/codebuster/application/views/home/icons/like-btn.png" class="like-btn"><span> &nbsp; like</span><span class="time">157 days ago via facebook</span></div></div></div></div><div class="more-answer-btn" onclick="return false"></div></div></div>
    <div class="questions-pagination" id="pagequestionnobtn"><span class="currentpage">1</span></div></div>