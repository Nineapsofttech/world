<table width="990" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td height="10" background="http://www.niyay.com/images/lef_pan.gif"><img src="http://www.niyay.com/images/lef_pan.gif" width="17" height="4"></td>
    <td height="10"></td>
    <td height="10" background="http://www.niyay.com/images/right_pan.gif"><img src="http://www.niyay.com/images/right_pan.gif" width="17" height="4"></td>
  </tr>
  <tr> 
    <td width="18" background="http://www.niyay.com/images/lef_pan.gif"><img src="http://www.niyay.com/images/lef_pan.gif" width="17" height="4"></td>
    <td width="955"><TABLE WIDTH=956 BORDER=0 align="center" CELLPADDING=0 CELLSPACING=0>
        <TR> 
          <TD COLSPAN=3> <IMG SRC="http://www.niyay.com/images/head_2_01.gif" WIDTH=738 HEIGHT=23 ALT=""></TD>
          <TD ROWSPAN=4> 
            <? if($_SESSION[sess_user_id]==""){?>
            <TABLE WIDTH=218 BORDER=0 CELLPADDING=0 CELLSPACING=0>
              <TR> 
                <TD COLSPAN=6> <IMG SRC="http://www.niyay.com/images/login_zone_01.gif" WIDTH=218 HEIGHT=55 ALT=""></TD>
              </TR>
              <form name="frm_login" method="post" action="http://www.niyay.com/login.php">
                <TR> 
                  <TD ROWSPAN=8> <IMG SRC="http://www.niyay.com/images/login_zone_02.gif" WIDTH=44 HEIGHT=110 ALT=""></TD>
                  <TD height="22" COLSPAN=4 bgcolor="#D6EB86"><input name="login" type="text" class="text12" style="WIDTH: 148px; HEIGHT: 16px" maxlength="12"></TD>
                  <TD width="18" height="110" ROWSPAN=8 valign="bottom" bgcolor="#D6EB86">

                  </TD>
                </TR>
                <TR>
                  <TD height="4" COLSPAN=4 bgcolor="#D6EB86"></TD>
                </TR>
                <TR> 
                  <TD height="22" COLSPAN=4 bgcolor="#D6EB86"><input name="pass" type="password" class="text12" style="WIDTH: 148px; HEIGHT: 16px" maxlength="12"></TD>
                </TR>
                <TR> 
                  <TD COLSPAN=4> <IMG SRC="http://www.niyay.com/images/login_zone_07.gif" WIDTH=155 HEIGHT=3 ALT=""></TD>
                </TR>
                <TR> 
                  <TD COLSPAN=3> <IMG SRC="http://www.niyay.com/images/login_zone_08.gif" WIDTH=110 HEIGHT=23 ALT=""></TD>
                  <TD width="45" height="23"> <input name="imageField" type="image" src="http://www.niyay.com/images/login_zone_09.gif" width="45" height="23" border="0"></TD>
                </TR>
                <TR>
                  <TD height="5" COLSPAN=4 bgcolor="#D6EB86"></TD>
                </TR>
              </form>
              <TR> 
                <TD> <a href="/member/index.php"><IMG SRC="http://www.niyay.com/images/login_zone_11.gif" ALT="" WIDTH=63 HEIGHT=24 border="0"></a></TD>
                <TD> <IMG SRC="http://www.niyay.com/images/login_zone_12.gif" WIDTH=27 HEIGHT=24 ALT=""></TD>
                <TD COLSPAN=2> <a href="/member/forget_password.php"><IMG SRC="http://www.niyay.com/images/login_zone_13.gif" ALT="" WIDTH=65 HEIGHT=24 border="0"></a></TD>
              </TR>
              <TR> 
                <TD COLSPAN=4> <IMG SRC="http://www.niyay.com/images/login_zone_14.gif" WIDTH=155 HEIGHT=7 ALT=""></TD>
              </TR>
              <TR> 
                <TD> <IMG SRC="http://www.niyay.com/images/spacer.gif" WIDTH=44 HEIGHT=1 ALT=""></TD>
                <TD> <IMG SRC="http://www.niyay.com/images/spacer.gif" WIDTH=63 HEIGHT=1 ALT=""></TD>
                <TD> <IMG SRC="http://www.niyay.com/images/spacer.gif" WIDTH=27 HEIGHT=1 ALT=""></TD>
                <TD> <IMG SRC="http://www.niyay.com/images/spacer.gif" WIDTH=20 HEIGHT=1 ALT=""></TD>
                <TD> <IMG SRC="http://www.niyay.com/images/spacer.gif" WIDTH=45 HEIGHT=1 ALT=""></TD>
                <TD> <IMG SRC="http://www.niyay.com/images/spacer.gif" WIDTH=19 HEIGHT=1 ALT=""></TD>
              </TR>
            </TABLE>
            <? }else{

	$query="SELECT Count( `blog_friend_id` ) AS CountRows FROM `blog_friend`  WHERE `blog_id` =$_SESSION[sess_user_id]  AND `accept` = 0";
	$resultx= mysql_query($query) or die("Err $query<br>");
	$fr_recieve=mysql_result($resultx,0,"CountRows");

	$query="SELECT Count( `blog_message_id` ) AS CountRows FROM `blog_message`  WHERE `blog_id` =$_SESSION[sess_user_id] AND `del`=0 AND `read`=0";
	$resultx= mysql_query($query) or die("Err $query<br>");
	$msg_recieve=mysql_result($resultx,0,"CountRows");
	
	$resultx=mysql_query("SELECT   `point`, `star` , `logo` FROM `yehyeh_user`  WHERE `yehyeh_user_id` =$_SESSION[sess_user_id] LIMIT 0 , 1");
	$rowsx=mysql_fetch_assoc($resultx);
	if($rowsx[logo]=="")
		$my_logo="http://www.niyay.com/images/logo6.jpg";
	else
		$my_logo="/member/logo/$rowsx[logo]";
	
	$point=$rowsx[point];
	$star=$rowsx[star];

?>
            <TABLE WIDTH=218 BORDER=0 CELLPADDING=0 CELLSPACING=0 bgcolor="#D6EB86" class="text14">
              <TR> 
                <TD COLSPAN=4> <IMG SRC="http://www.niyay.com/images/welcome_zone_01.gif" WIDTH=218 HEIGHT=25 ALT=""></TD>
              </TR>
              <TR > 
                <TD height="31" COLSPAN=4 background="http://www.niyay.com/images/welcome_zone_02.gif"><div align="left">&nbsp;&nbsp;�Թ�յ�͹�Ѻ: 
                    <font color="#FF0000"><strong><? echo $_SESSION[sess_user_login]?></strong></font></div></TD>
              </TR>
              <TR> 
                <TD ROWSPAN=2> <IMG SRC="http://www.niyay.com/images/welcome_zone_03.gif" WIDTH=13 HEIGHT=109 ALT=""></TD>
                <TD width="90" height="90" bgcolor="#FFFFFF"><a href="/blog/blog.php?blog_id=<? echo $_SESSION[sess_user_id]?>"><img src="<? echo $my_logo?>" width="90" height="90" border="0"></a></TD>
                <TD ROWSPAN=2> <IMG SRC="http://www.niyay.com/images/welcome_zone_05.gif" WIDTH=9 HEIGHT=109 ALT=""></TD>
                <TD width="106" height="109" ROWSPAN=2 valign="top">cool: <? echo $star?><br>
                  point: <? echo $point?><br>
                  level: <? echo (int)($point/100);?><br>
                  �������͹:<font color="#FF0000"> <? echo $fr_recieve;?></font><br>
                  ��ͤ���: <font color="#FF0000"><? echo $msg_recieve;?><br>
                  </font><a href="/logout.php"><font color=red>�͡�ҡ�к�</font></a></TD>
              </TR>
              <TR> 
                <TD> <IMG SRC="http://www.niyay.com/images/welcome_zone_07.gif" WIDTH=90 HEIGHT=19 ALT=""></TD>
              </TR>
            </TABLE>
            <? }?>
          </TD>
        </TR>
        <TR> 
          <TD ROWSPAN=2> <IMG SRC="http://www.niyay.com/images/head_2_03.gif" WIDTH=248 HEIGHT=109 ALT=""></TD>
          <TD width="470" height="86"><img src="http://www.niyay.com/images/strip_ad2.jpg" width="470" height="86"></TD>
          <TD ROWSPAN=2> <IMG SRC="http://www.niyay.com/images/head_2_05.gif" WIDTH=20 HEIGHT=109 ALT=""></TD>
        </TR>
        <TR> 
          <TD width="470" height="23">&nbsp; </TD>
        </TR>
        <TR> 
          <TD height="33" COLSPAN=2 background="http://www.niyay.com/images/head_new_19_2.gif" bgcolor="#A6D73F"><div align="center"><font color="#000000"><a href="/"><font color="#000000" class="text14">˹���á</font></a> 
              | <a href="http://game.niyay.com/" target="_blank"><font color="#000000" class="text14">����</font></a> 
              | <a href="http://webboard.niyay.com/" target="_blank"><font color="#000000" class="text14">webboard</font></a> 

			  | <a href="http://www.niyay.com/story/" target="_blank"><font color="#000000" class="text14">�����</font></a> 
              | <a href="http://www.niyay.com/short_story/" target="_blank"><font color="#000000" class="text14">����ͧ���</font></a> 
              | <a href="http://www.niyay.com/poem/" target="_blank"><font color="#000000" class="text14">��͹</font></a> 
              | <a href="http://webboard.niyay.com/index.php?webboard_type_id=22" target="_blank"><font color="#000000" class="text14">����</font></a> 
              | <a href="http://glitter.niyay.com/" target="_blank"><font color="#000000" class="text14">glitter</font></a> 
              | <a href="http://clip.niyay.com/" target="_blank"><font color="#000000" class="text14">clip</font></a> 
              | <a href="http://wallpaper.niyay.com/" target="_blank"><font color="#000000" class="text14">wallpaper</font></a> 
              | <a href="http://radio.niyay.com/"><font color="#000000" class="text14">radio</font></a> 
              | <a href="http://www.niyay.com/blog/" target="_blank"><font color="#000000" class="text14">blog</font></a> 
          | <a href="http://webboard.niyay.com/index.php?webboard_type_id=23" target="_blank"><font color="#000000" class="text14">���õ��202.43.36.116</font></a></font></div></TD>
          <TD width="18" height="33" background="http://www.niyay.com/images/head_new_19_2.gif" bgcolor="#A6D73F"> 
            <? if($page_name==""){?>
            <script language="javascript1.1" src="http://hits.truehits.in.th/data/t0029739.js"></script>
			<NOSCRIPT> 
			<a target="_blank" href="http://truehits.net/stat.php?id=t0029739"> <img src="http://hits.truehits.in.th/noscript.php?id=t0029739" alt="Thailand Web Stat" border=0 width=14 height=17></a> 
			<a target="_blank" href="http://truehits.net/">Truehits.net</a> 
			</NOSCRIPT>
            <? }else{?>
            <!--BEGIN WEB STAT CODE-->
<script type="text/javascript"> __th_page="<?=$page_name;?>";</script>
<script type="text/javascript" src="http://hits.truehits.in.th/data/t0029739.js"></script>
<noscript> 
<a target="_blank" href="http://truehits.net/stat.php?id=t0029739"><img src="http://hits.truehits.in.th/noscript.php?id=t0029739" alt="Thailand Web Stat" border="0" width="14" height="17" /></a> 
<a target="_blank" href="http://truehits.net/">Truehits.net</a> 
</noscript>
<!-- END WEBSTAT CODE -->
<? }?>
            

			<iframe src="/online_now.php" height="1" width="1" scrolling="no"></iframe>
          </TD>
        </TR>
      </TABLE></td>
    <td background="http://www.niyay.com/images/right_pan.gif"><img src="http://www.niyay.com/images/right_pan.gif" width="17" height="4"></td>
  </tr>
  <tr> 
    <td height="10" background="http://www.niyay.com/images/lef_pan.gif"><img src="http://www.niyay.com/images/lef_pan.gif" width="17" height="4"></td>
    <td height="10"></td>
    <td height="10" background="http://www.niyay.com/images/right_pan.gif"><img src="http://www.niyay.com/images/right_pan.gif" width="17" height="4"></td>
  </tr>
</table>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">