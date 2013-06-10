<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:21:06, compiled from D:\xampp\htdocs\test/template/login/login.htm */ ?>
<html>
<head>
    <title>Login</title>
    <link href="data/css/test1.css" type="text/css" rel="stylesheet">
    <link href="data/css/mode.css" type="text/css" rel="stylesheet">
</head>
<body>
<table width="840" height="40" border="0" align="center" cellspacing="0">
  <tr>
    <td width="352" height="35" align="left" valign="middle" bgcolor="#FF0000"> <a  class="logo1" href="index.php?c=index&a=run">Pizzahuts</a></td>
    <td width="285" align="center" valign="middle" bgcolor="#FF0000"><form action="index.php?c=index&a=run&type=search" method="POST" target="_blank">
      <span class="title1">search </span>
      <input name="fname" type="text" value="<?php echo $fname; ?>"/>
      <span class="title1">
        <input type="image" src="data/images/search.png" alt="Submit" align="middle" />
        </span>
    </form></td>
    <td width="72" align="center" valign="middle" bgcolor="#FF0000" ><a class="title1" href="index.php?c=myorder&a=run"> My order</a> </td>
    <td width="58" align="center" valign="middle" bgcolor="#FF0000" ><a class="title1" href=<?php echo $loginurl;?>><?php echo $loginname;?></a></td>
    <td width="63" align="center" valign="middle" bgcolor="#FF0000"><a href="index.php?c=register&a=run"class="title1">Register </a></td>
  </tr>
</table>
<div class="content">
	<div id="tab">
			<table cellpadding="10">
				<tr>
					<td>Login</td>
					<td bgcolor = #d0d0d0><a href="index.php?c=register&a=run"><span>Register</span></a></td>
				</tr>
			</table>
		</div>
		<div id="register_form_div">
	    <form name=form method=post action="index.php?c=login&a=check">
	        <table>
	        		<tr><td>&nbsp;</td></tr> 				<!--这里填写错误信息-->
	        		
	            <tr>
	            	<td>Username:&nbsp;&nbsp;</td>
	              <td><input type=text name=Username size=20></td>
	            </tr>
	            <tr><td>&nbsp;  </td></tr>
	            <tr>
								<td>Password:&nbsp;&nbsp;</td>
	              <td><input type=password  name=Password size=20></td>
	            </tr>
	            <tr><td> <br/> </td></tr>
	            <tr><td colspan=2> <input type=submit value=Login></input></td></tr>
	            <tr><td>&nbsp;</td></tr>
	        </table>
	    </form>
	  </div>
  </div>
</body>
</html>