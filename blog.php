<? require_once "session_blog.php";
require_once "blog_theme.php";


//if($_SESSION[sess_user_id]==$blog_id)
//	$my_blog=true;
//require "gen_history.php";
/*
$result=mysql_query("SELECT `blog_ment_id`  FROM `blog_ment`  WHERE `blog_id` =$blog_id ORDER BY `blog_ment_id` DESC  LIMIT 0 , 1");
$rows=mysql_fetch_assoc($result);
$blog_ment_id=$rows[blog_ment_id];
*/

function is_friend($blog_id){
	$query="SELECT `accept` FROM `blog_friend`  WHERE  (`blog_id` =$blog_id AND `yehyeh_user_id` =$_SESSION[sess_user_id] ) OR  (`blog_id` =$_SESSION[sess_user_id] AND `yehyeh_user_id` =  $blog_id ) LIMIT 0 , 1";

	$resultx=mysql_query($query);
	$rowsx=mysql_fetch_assoc($resultx);

	return $rowsx[accept];
}
$s_friend=is_friend($blog_id);



if($blog_rows[logo]=="")
	$logo_pic="/images/logo$theme.jpg";
else
	$logo_pic="/member/logo/$blog_rows[logo]";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><? if($blog_rows[blog_header]=="")echo "blog �ͧ $blog_rows[login]";else echo $blog_rows[blog_header]?></title>
<link rel="image_src" href="http://www.niyay.com<?=$logo_pic;?>" />
<meta name="description" content="����������� blog �ͧ <?=$blog_rows[login];?> �ѹ���� � �Ш��" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
<? require "blog_css.php";?>
-->
</style>
</head>

<body <? if($reply_id!=""){?>onLoad="frm_ment.ment.focus();"<? }?>>
<script src="/ajaxsbmt.js" type="text/javascript"></script>
<? require ("blog_head.php")?>
<? require "../ajax.js";?>
<script type="text/javascript">

//var xhr=createXHRObject();
var show_x=true;

function getRequestBody(pForm) {
	var nParams = new Array();
	
	for (var i=0 ; i < pForm.elements.length; i++) {
		if(!((pForm.elements[i].type=="radio" && pForm.elements[i].checked == false) || (pForm.elements[i].type=="checkbox" && pForm.elements[i].checked == false) )){
			var pParam = encodeURIComponent(pForm.elements[i].name);
			pParam += "=";
			pParam += encodeURIComponent(pForm.elements[i].value);
			nParams.push(pParam);
		}
	} 
	
	return nParams.join("&");        
}

function Send_Form(pForm,display,sync_method){
	var sync_method = sync_method||true;
	var xhr=createXHRObject();
	var xdate = new Date();
	var pBody = getRequestBody(pForm); 
	//alert(pBody);
	if(sync_method==2)
		sync_method=false;
		
	pBody+="&txtxtx="+xdate.getTime();
	xhr.open("post", pForm.action, sync_method);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function() {//Call a function when the state changes.
		if(xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById(display).innerHTML = xhr.responseText;
		}
		else
			document.getElementById(display).innerHTML = '<img src=\'/img/pleasewait.gif\'><br>����͹ҹ�Թ仡硴 submit ����¨��'; 
	}
	xhr.send(pBody);
}

function send_ment(){
	show_x=true;
	//var pForm=document.getElementById("frm_ment");
	if(frm_ment.ment.value==""){
	//if(pForm.ment.value==""){
		show_ment();
		return false;
	}
	else{
		xmlhttpPost('/blog/blog_ment_save2.php', 'frm_ment', 'ment_display', '<img src=\'/img/pleasewait.gif\'><br>����͹ҹ�Թ仡硴 submit ����¨��'); 
		show_ment();
	}
		//Send_Form(pForm,'ment_display',2);
		
	frm_ment.ment.focus();
	frm_ment.ment.value="";
	frm_ment.ment.reply_id="";
	//show_ment();
	return false;
}




function send_cool(){
	var pForm=document.getElementById("frm_star");
	Send_Form(pForm,'cool_display');
	alert("�� cool ��� � �֧���͹�س���Ǥ��");

	return false;	
}

function show_main_horo() {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("show_main_horo").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
	};
	
	xhr.open("GET", "/blog/show_main_horo.php"+param,true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function show_horo(s_date) {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?day="+s_date+"&t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("show_horo").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
	};
	
	xhr.open("GET", "/blog/show_horo.php"+param,true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function show_dream(dream) {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?dream="+dream+"&t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("show_dream").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
	};
	
	xhr.open("GET", "/blog/show_dream.php"+param,true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function show_cool(file_name) {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("show_cool_story").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
	};
	
	xhr.open("GET", file_name+param,true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function show_cool_blog(file_name) {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("show_cool_blog").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
	};
	
	xhr.open("GET", file_name+param,true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function show_favorites(file_name) {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("show_favorites").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
	};
	
	xhr.open("GET", file_name+param,true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function add_friend() {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("add_friend_display").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
		  else{
				document.getElementById("add_friend_display").innerHTML = '<img src=\'/img/pleasewait.gif\'>';
		}
	};
	
	xhr.open("GET", "/blog/friend_add.php?blog_id=<? echo $_GET[blog_id]?>",true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function block_friend() {
	var xdate = new Date();
	var xhr=createXHRObject();
	param="?t="+xdate.getTime();
	param=encodeURI(param);
	xhr.onreadystatechange = function () { 
		  if (xhr.readyState==4 && xhr.status==200) {
				document.getElementById("block_friend_display").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		  }
		  else{
				document.getElementById("block_friend_display").innerHTML = '<img src=\'/img/pleasewait.gif\'>';
		}
	};
	
	xhr.open("GET", "/blog/friend_ban.php?user_id=<? echo $_GET[blog_id]?>&from_blog=1",true); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}


function show_user_online_now() {
	var xdate = new Date();
	var xhr=createXHRObject();
	xhr.onreadystatechange = function () { 
		if (xhr.readyState==4 && xhr.status==200) 
			document.getElementById("show_online_now").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		else
		  	document.getElementById("show_online_now").innerHTML = '<div align=center><img src=\'/img/pleasewait.gif\'></div>';
	};
	//alert ("555");
	xhr.open("GET", "/blog/friend_online.php?blog_id=<?=$blog_id;?>&t=" + xdate.getTime(),false); //���ҧ connection
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

function show_visitor(by_click) {
	//var by_click = by_click||1;
	var xdate = new Date();
	var xhr=createXHRObject();
	xhr.onreadystatechange = function () { 
		if (xhr.readyState==4 && xhr.status==200) 
			document.getElementById("show_visitor").innerHTML=xhr.responseText; //�Ѻ��ҡ�Ѻ��
		else //if(by_click==1)
		  	document.getElementById("show_visitor").innerHTML = '<div align=center><img src=\'/img/pleasewait.gif\'></div>';
	};
	//alert(by_click);
	//xhr.open("GET", "/blog/history/blog_visitor_<?=$blog_id;?>.html?t=" + xdate.getTime(),true); //���ҧ connection
	xhr.open("GET", "/blog/blog_visitor2.php?blog_id=<?=$blog_id;?>&t=" + xdate.getTime(),true); //���ҧ connection
	
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
	xhr.send(null); //�觤��
}

var time = 3; //time in seconds
var interval = time * 1000;
var interval2 = 6 * 1000;

var timer2 = setInterval("show_online()", interval2); 
var page=1;

<? //if(($_SESSION[sess_user_id]!=""&&$s_friend==1)||$_SESSION[sess_user_id]==$blog_id){ 
if($_SESSION[sess_user_id]==$blog_id){ ?>
var timer = setInterval("show_ment()", interval); 
loop_timer();
<? }?>

function loop_timer(){
	show_ment();
}

function set_page(p){
	page=p;
	
	if(page==1){
		show_x=true;
		show_ment();
	}
	else{
		if(show_x==false)
			show_x=true;
		show_ment();
		show_x=false;
	}
	
}

function show_ment_page(reply_id,p_page){
	var p_page = p_page||1;
	var xhr=createXHRObject();
	var xdate = new Date();

	show_x=false;
	frm_ment.reply_id.value=reply_id;
	frm_ment.ment.value="";
	frm_ment.ment.focus();
	str_x="/blog/blog_ment.php?blog_id=<?=$blog_id;?>&reply_id="+reply_id+"&page="+p_page+"&t=" + xdate.getTime();

	xhr.open("GET",str_x,true);
//alert(show_x+" : " + interval);
	xhr.onreadystatechange = function() {//Call a function when the state changes.
		if(xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("ment_display").innerHTML = xhr.responseText;
		}
		else{
			if(reply_id!="")
				document.getElementById("ment_display").innerHTML = "<br><img src=\'/img/pleasewait.gif\'><p><a href='javascript:show_ment_page("+reply_id+",1)'><font color='<? echo $ment_fg?>'>����͹ҹ���� comment ����� ������ԡ ����� ����¨��..</font></a> <img src='/img/icon_update.gif' width='45' height='14' /></p>";
		}
	}
	xhr.send(null);
}

function show_ment(reply_id){
	var reply_id = reply_id||0;
	var xhr=createXHRObject();
	//alert(show_x);
	
	if(show_x!=true)
		return false;
	
	var xdate = new Date();
	if(reply_id==0){
		reply_id="";
		show_x=true;
		frm_ment.reply_id.value="";

		str_x="/blog/blog_ment.php?blog_id=<?=$blog_id;?>&reply_id="+reply_id+"&page="+page+"&t=" + xdate.getTime();

	}
	else{
		show_x=false;
		frm_ment.reply_id.value=reply_id;
		frm_ment.ment.value="";
		frm_ment.ment.focus();
		str_x="/blog/blog_ment.php?blog_id=<?=$blog_id;?>&reply_id="+reply_id+"&page="+page+"&t=" + xdate.getTime();
	}
		
	//if(reply_id!="")
	//	xhr.open("GET",str_x,false);
	//else
		xhr.open("GET",str_x,true);
	//alert(show_x+" : " + interval);
	xhr.onreadystatechange = function() {//Call a function when the state changes.
		//alert(show_x+"2");
		if(xhr.readyState == 4 && xhr.status == 200) {
			document.getElementById("ment_display").innerHTML = xhr.responseText;
		}
		else{
			
			if(reply_id!=0){
				str_y="<img src='/img/pleasewait.gif'><br><font color='<? echo $ment_fg?>'>����͹ҹ�Թ仡� ��ԡ submit ����¨��</font>";
				document.getElementById("ment_display").innerHTML = str_y;
			}
			<? if($_SESSION[sess_user_id]!=$blog_id){?>
			else // if(page>1)
				document.getElementById("ment_display").innerHTML = '<img src=\'/img/pleasewait.gif\'>';
			<? }?>
		}
	}
	xhr.send(null);
	
	//document.getElementById("show_update_time").innerHTML ="<font color='blue'>last update "+xdate.toLocaleTimeString()+"</font>";
}

function show_online(){
	var xhr=createXHRObject();
	if( typeof show_online.counter == 'undefined' ) {
		show_online.counter = 0;
	}
	show_online.counter++;
	
	if(show_online.counter%<? if($_SESSION[sess_user_id]==$blog_id)echo "3";else echo "5";?>==0){
		var xdate = new Date();
		<? if($_SESSION[sess_user_id]==$blog_id){?>
		xhr.open("GET","/blog/friend_pic_online_ok.php?blog_id=<?=$blog_id;?>&t=" + xdate.getTime(),true);
		<? }else{?>
		xhr.open("GET","/blog/inc/friend_pic_online.html?t=" + xdate.getTime(),true);
		<? }?>
		xhr.onreadystatechange = function() {//Call a function when the state changes.
			if(xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById("online_display").innerHTML = xhr.responseText;
			}
		}
		xhr.send(null);
	}
	
	if(show_online.counter%31==0){
		var xdate = new Date();

		xhr.open("GET","/blog/blog_ment_regen.php?blog_id=<?=$blog_id;?>&t=" + xdate.getTime(),true);
		xhr.onreadystatechange = function() {//Call a function when the state changes.
			if(xhr.readyState == 4 && xhr.status == 200) {
				document.getElementById("regen_display").innerHTML = xhr.responseText;
			}
		}
		xhr.send(null);
	}
	
	if(show_online.counter%18==0){	
		show_visitor(2);
	}
	
}


</script>
<? require ("blog_body.php");?>

<? require ("blog_footer.php")?>

</body>
</html>

<?
$reply_id="";
$page=1;
require "gen_ment.php";

?>
<? require_once "gen_qr_code.php";?>